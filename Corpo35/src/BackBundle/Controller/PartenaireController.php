<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Partenaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Logo;

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
        $partenaire = new Partenaire();
        $form = $this->createForm('BackBundle\Form\PartenaireType', $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logo = $partenaire->getLogo();

            // Generate a unique name for the file before saving it
            $logoName = md5(uniqid()).'.'.$logo->guessExtension();

            // Move the file to the directory where brochures are stored
            $logo->move(
                $this->getParameter('upload_directory'),
                $logoName
            );
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $partenaire->setLogo($logoName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($partenaire);
            $em->flush($partenaire);

            return $this->redirectToRoute('partenaire_show', array('id' => $partenaire->getId()));
        }

        return $this->render('partenaire/new.html.twig', array(
            'partenaire' => $partenaire,
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
    public function editAction(Request $request, Partenaire $partenaire)
    {
        if (is_file ($partenaire->getLogo())) {
            $old_logo = new Logo($this->getParameter('upload_directory') . '/' . $partenaire->getLogo());
        } else {
            $partenaire->setLogo('');
        }

        $deleteForm = $this->createDeleteForm($partenaire);
        $editForm = $this->createForm('BackBundle\Form\PartenaireType', $partenaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            if (!$partenaire->getLogo())
            {
                $partenaire->setLogo($old_logo);
            } else
            {
                $logo = $partenaire->getLogo();

                // Generate a unique name for the file before saving it
                $logoName = md5(uniqid()).'.'.$logo->guessExtension();

                // Move the file to the directory where brochures are stored
                $logo->move(
                    $this->getParameter('upload_directory'),
                    $logoName
                );
                $partenaire->setLogo($logoName);

            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partenaire_edit', array('id' => $partenaire->getId()));
        }

        return $this->render('partenaire/edit.html.twig', array(
            'partenaire' => $partenaire,
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
