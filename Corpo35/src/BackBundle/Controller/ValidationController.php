<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Validation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Validation controller.
 *
 * @Route("validation")
 */
class ValidationController extends Controller
{
    /**
     * Lists all validation entities.
     *
     * @Route("/", name="validation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $validations = $em->getRepository('BackBundle:Validation')->findAll();

        return $this->render('validation/index.html.twig', array(
            'validations' => $validations,
        ));
    }

    /**
     * Creates a new validation entity.
     *
     * @Route("/new", name="validation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $validation = new Validation();
        $form = $this->createForm('BackBundle\Form\ValidationType', $validation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($validation);
            $em->flush($validation);

            return $this->redirectToRoute('validation_show', array('id' => $validation->getId()));
        }

        return $this->render('validation/new.html.twig', array(
            'validation' => $validation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a validation entity.
     *
     * @Route("/{id}", name="validation_show")
     * @Method("GET")
     */
    public function showAction(Validation $validation)
    {
        $deleteForm = $this->createDeleteForm($validation);

        return $this->render('validation/show.html.twig', array(
            'validation' => $validation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing validation entity.
     *
     * @Route("/{id}/edit", name="validation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Validation $validation)
    {
        $deleteForm = $this->createDeleteForm($validation);
        $editForm = $this->createForm('BackBundle\Form\ValidationType', $validation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('validation_edit', array('id' => $validation->getId()));
        }

        return $this->render('validation/edit.html.twig', array(
            'validation' => $validation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a validation entity.
     *
     * @Route("/{id}", name="validation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Validation $validation)
    {
        $form = $this->createDeleteForm($validation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($validation);
            $em->flush($validation);
        }

        return $this->redirectToRoute('validation_index');
    }

    /**
     * Creates a form to delete a validation entity.
     *
     * @param Validation $validation The validation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Validation $validation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('validation_delete', array('id' => $validation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
