<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Agenda_Labo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Agenda_labo controller.
 *
 * @Route("agenda_labo")
 */
class Agenda_LaboController extends Controller
{
    /**
     * Lists all agenda_Labo entities.
     *
     * @Route("/", name="agenda_labo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agenda_Labos = $em->getRepository('BackBundle:Agenda_Labo')->findAll();

        return $this->render('agenda_labo/index.html.twig', array(
            'agenda_Labos' => $agenda_Labos,
        ));
    }

    /**
     * Creates a new agenda_Labo entity.
     *
     * @Route("/new", name="agenda_labo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agenda_Labo = new Agenda_labo();
        $form = $this->createForm('BackBundle\Form\Agenda_LaboType', $agenda_Labo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agenda_Labo);
            $em->flush($agenda_Labo);

            return $this->redirectToRoute('agenda_labo_show', array('id' => $agenda_Labo->getId()));
        }

        return $this->render('agenda_labo/new.html.twig', array(
            'agenda_Labo' => $agenda_Labo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agenda_Labo entity.
     *
     * @Route("/{id}", name="agenda_labo_show")
     * @Method("GET")
     */
    public function showAction(Agenda_Labo $agenda_Labo)
    {
        $deleteForm = $this->createDeleteForm($agenda_Labo);

        return $this->render('agenda_labo/show.html.twig', array(
            'agenda_Labo' => $agenda_Labo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agenda_Labo entity.
     *
     * @Route("/{id}/edit", name="agenda_labo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Agenda_Labo $agenda_Labo)
    {
        $deleteForm = $this->createDeleteForm($agenda_Labo);
        $editForm = $this->createForm('BackBundle\Form\Agenda_LaboType', $agenda_Labo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agenda_labo_edit', array('id' => $agenda_Labo->getId()));
        }

        return $this->render('agenda_labo/edit.html.twig', array(
            'agenda_Labo' => $agenda_Labo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agenda_Labo entity.
     *
     * @Route("/{id}", name="agenda_labo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Agenda_Labo $agenda_Labo)
    {
        $form = $this->createDeleteForm($agenda_Labo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agenda_Labo);
            $em->flush($agenda_Labo);
        }

        return $this->redirectToRoute('agenda_labo_index');
    }

    /**
     * Creates a form to delete a agenda_Labo entity.
     *
     * @param Agenda_Labo $agenda_Labo The agenda_Labo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agenda_Labo $agenda_Labo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agenda_labo_delete', array('id' => $agenda_Labo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }





}
