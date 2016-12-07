<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Candidat;
use BackBundle\Entity\Document;
use BackBundle\Entity\Validation;
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
     *
     * @Route("/new", name="candidat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $candidat = new Candidat();

        $doc = new Document();
        $candidat->addDocument($doc);


        $form = $this->createForm('BackBundle\Form\CandidatType', $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidat);
            $em->flush($candidat);

            return $this->redirectToRoute('candidat_show', array('id' => $candidat->getId()));
        }

        return $this->render('candidat/new.html.twig', array(
            'candidat' => $candidat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a candidat entity.
     *
     * @Route("/{id}", name="candidat_show")
     * @Method("GET")
     */
    public function showAction(Candidat $candidat)
    {
        $deleteForm = $this->createDeleteForm($candidat);

        return $this->render('candidat/show.html.twig', array(
            'candidat' => $candidat,
            'delete_form' => $deleteForm->createView(),
        ));
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

        return $this->redirectToRoute('candidat_index');
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
