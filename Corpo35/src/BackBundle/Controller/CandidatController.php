<?php

namespace BackBundle\Controller;

use BackBundle\BackBundle;
use BackBundle\Entity\Candidat;
use BackBundle\Entity\Document;
use BackBundle\Entity\User;
use BackBundle\Entity\Vote;
use BackBundle\Entity\Validation;
use FOS\UserBundle\FOSUserBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Candidat controller.
 *
 * @Route("/")
 */
class CandidatController extends Controller
{
    /**
     * Lists all candidat entities.
     *
     * @Route("/list", name="candidat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $candidats = $em->getRepository('BackBundle:Candidat')->findAll();

        return $this->render('candidat/index.html.twig', array(
            'candidats' => $candidats,
        ));
    }

    /**
     * Creates a new candidat entity.
     * @Route("/new", name="candidat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $candidat = new Candidat();
        $document = new Document();
        $candidat->addDocument($document);
        $idUser = $this->container->get('security.context')->getToken()->getUser();
        $candidat->setFosUser($idUser);

        $form = $this->createForm('BackBundle\Form\CandidatType', $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
//            Ajout du cv
            $cv = $candidat->getCv();

            $cvName = md5(uniqid()).'.'.$cv->guessExtension();
            $cv->move(
                $this->getParameter('upload_directory'),
                $cvName
            );
            $candidat->setCv($cvName);
//            Fin de l'ajout du cv

//            Ajout de la photo
            $photo = $candidat->getPhoto();
            $photoName = md5(uniqid()).'.'.$photo->guessExtension();
            $photo->move(
                $this->getParameter('upload_directory'),
                $photoName
            );
            $candidat->setPhoto($photoName);
//            Fin de l'ajout de la photo

//            Ajout des documents
            $documents = $candidat->getDocuments();
            foreach ($documents as $document) {
                $file = $document->getContenu();
                if  ($file) {
                    $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                    $file->move(
                        $this->getParameter('upload_directory'),
                        $fileName
                    );
                    $document->setContenu($fileName);
                    $candidat->addDocument($document);
                }
            }


//            Fin de l'ajout des documents
            $candidat->setMiseEnAvant(0);
            $candidat->setDecision(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidat);
            $em->flush();

//          Ajout FlashBag message après l'envoi du formulaire
            $this->get('session')
                ->getFlashBag()
                ->add('success', 'Merci pour votre inscrition, votre candidature sera étudiée attentivement.
                    Nous vous ferons part de notre décision par mail.<br/> Voici les informations qui seront visible
                    par les jurés.');

            return $this->redirectToRoute('candidat_show', array(
                'id' => $candidat->getId(),
            ));
        }

        return $this->render('candidat/new.html.twig', array(
            'candidat' => $candidat,
            'form' => $form->createView())
        );
    }

    /**
     * Finds and displays a candidat entity.
     *
     * @Route("/{id}", name="candidat_show")
     */
    public function showAction(Request $request,Candidat $candidat)
    {


        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BackBundle:User')->findAll();
        $votes = $em->getRepository('BackBundle:Vote')->findAll();


        $form = $this->createForm('BackBundle\Form\DecisionType', $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidat_index');
        }



        $deleteForm = $this->createDeleteForm($candidat);
        return $this->render('candidat/show.html.twig', array(
            'users'=>$users,
            'candidat' => $candidat,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     *
     * @Route("/vote/{id}", name="jure_vote")
     */
    public function oneVoteAction(Candidat $candidat, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $voteExist = $em->getRepository('BackBundle:Vote')->findBy(['user' => $this->getUser(), 'candidat' => $candidat]);
        if (!$voteExist) {

            $vote = new Vote();

            $formCommentaire = $this->createForm('BackBundle\Form\VoteType', $vote);
            $formCommentaire->handleRequest($request);

            if ($formCommentaire->isSubmitted() && $formCommentaire->isValid()) {
                $vote->setUser($this->getUser());
                $vote->setCandidat($candidat);
                $em->persist($vote);
                $em->flush();
                return $this->redirectToRoute('candidat_index');
            }
            return $this->render('BackBundle:Default:BackVote.html.twig', array(
                'formCommentaire' => $formCommentaire->CreateView(),
                'candidat'=>$candidat,
            ));
        } else {

            return $this->render('BackBundle:Default:DejaVote.html.twig', array());
        }


    }


    /**
     * Displays a form to edit an existing candidat entity.
     *
     * @Route("/{id}/edit", name="candidat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Candidat $candidat)
    {
        $deleteForm = $this->createDeleteForm($candidat);
        $editForm = $this->createForm('BackBundle\Form\CandidatType', $candidat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidat_edit', array('id' => $candidat->getId()));
        }

        return $this->render('candidat/edit.html.twig', array(
            'candidat' => $candidat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Deletes a candidat entity.
     *
     * @Route("/{id}", name="candidat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Candidat $candidat)
    {
        $form = $this->createDeleteForm($candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($candidat);
            $em->flush($candidat);
        }
    }



    /**
     * Creates a form to delete a candidat entity.
     *
     * @param Candidat $candidat The candidat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Candidat $candidat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('candidat_delete', array('id' => $candidat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
