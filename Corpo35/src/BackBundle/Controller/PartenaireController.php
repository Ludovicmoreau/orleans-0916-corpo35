<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Partenaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Partenaire controller.
 *
 * @Route("partenaire")
 */
class PartenaireController extends Controller
{
    /**
     * Lists all partenaire entities.
     *
     * @Route("/", name="partenaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partenaires = $em->getRepository('BackBundle:Partenaire')->findAll();

        return $this->render('partenaire/index.html.twig', array(
            'partenaires' => $partenaires,
        ));
    }

    /**
     * Creates a new partenaire entity.
     *
     * @Route("/new", name="partenaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $imgPartenaire = new Partenaire();
        $form = $this->createForm('BackBundle\Form\PartenaireType', $imgPartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $imgPartenaire->getFile();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('upload_directory'),
                $fileName
            );
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $imgPartenaire->setFile($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($imgPartenaire);
            $em->flush($imgPartenaire);

            return $this->redirectToRoute('partenaire_show', array('id' => $imgPartenaire->getId()));
        }

        return $this->render('partenaire/new.html.twig', array(
            'partenaire' => $imgPartenaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partenaire entity.
     *
     * @Route("/{id}", name="partenaire_show")
     * @Method("GET")
     */
    public function showAction(Partenaire $partenaire)
    {
        $deleteForm = $this->createDeleteForm($partenaire);

        return $this->render('partenaire/show.html.twig', array(
            'partenaire' => $partenaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partenaire entity.
     *
     * @Route("/{id}/edit", name="partenaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Partenaire $imgPartenaire)
    {
        if (is_file ($imgPartenaire->getFile())) {
            $partenaire = new File($this->getParameter('upload_directory') . '/' . $imgPartenaire->getFile());
        } else {
            $imgPartenaire->setFile('');
        }

        $deleteForm = $this->createDeleteForm($imgPartenaire);
        $editForm = $this->createForm('BackBundle\Form\PartenaireType', $imgPartenaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            if (!$imgPartenaire->getFile())
            {
                $imgPartenaire->setFile($partenaire);
            } else
            {
                $file = $imgPartenaire->getFile();

                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                // Move the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('upload_directory'),
                    $fileName
                );
                $imgPartenaire->setFile($fileName);

            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partenaire_edit', array('id' => $imgPartenaire->getId()));
        }

        return $this->render('partenaire/edit.html.twig', array(
            'partenaire' => $imgPartenaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partenaire entity.
     *
     * @Route("/{id}", name="partenaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Partenaire $partenaire)
    {
        $form = $this->createDeleteForm($partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partenaire);
            $em->flush($partenaire);
        }

        return $this->redirectToRoute('partenaire_index');
    }

    /**
     * Creates a form to delete a partenaire entity.
     *
     * @param Partenaire $partenaire The partenaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partenaire $partenaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partenaire_delete', array('id' => $partenaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
