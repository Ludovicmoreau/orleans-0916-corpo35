<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Rpresse;
use BackBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Rpresse controller.
 *
 * @Route("/rpresse")
 */
class RpresseController extends Controller
{
    /**
     * Lists all rpresse entities.
     *
     * @Route("/", name="rpresse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rpresses = $em->getRepository('BackBundle:Rpresse')->findAll();

        return $this->render('rpresse/index.html.twig', array(
            'rpresses' => $rpresses,
        ));
    }

    /**
     * Creates a new rpresse entity.
     *
     * @Route("/new", name="rpresse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rpresse = new Rpresse();

        $form = $this->createForm('BackBundle\Form\RpresseType', $rpresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $document = $rpresse->getDocument();

            $documentName = md5(uniqid()).'.'.$document->guessExtension();
            $document->move(
                $this->getParameter('upload_directory'),
                $documentName
            );
            $rpresse->setDocument($documentName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($rpresse);
            $em->flush();

            return $this->redirectToRoute('rpresse_show', array('id' => $rpresse->getId()));
        }

        return $this->render('rpresse/new.html.twig', array(
            'rpresse' => $rpresse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rpresse entity.
     *
     * @Route("/{id}", name="rpresse_show")
     * @Method("GET")
     */
    public function showAction(Rpresse $rpresse)
    {
        $deleteForm = $this->createDeleteForm($rpresse);

        return $this->render('rpresse/show.html.twig', array(
            'rpresse' => $rpresse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rpresse entity.
     *
     * @Route("/{id}/edit", name="rpresse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rpresse $rpresse)
    {
        $deleteForm = $this->createDeleteForm($rpresse);
        $editForm = $this->createForm('BackBundle\Form\RpresseType', $rpresse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rpresse_edit', array('id' => $rpresse->getId()));
        }

        return $this->render('rpresse/edit.html.twig', array(
            'rpresse' => $rpresse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rpresse entity.
     *
     * @Route("/{id}", name="rpresse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rpresse $rpresse)
    {
        $form = $this->createDeleteForm($rpresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rpresse);
            $em->flush($rpresse);
        }

        return $this->redirectToRoute('rpresse_index');
    }

    /**
     * Creates a form to delete a rpresse entity.
     *
     * @param Rpresse $rpresse The rpresse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rpresse $rpresse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rpresse_delete', array('id' => $rpresse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
