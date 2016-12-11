<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Agenda_evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Agenda_evenement controller.
 *
 * @Route("agenda_evenement")
 */
class Agenda_evenementController extends Controller
{
    /**
     * Lists all agenda_evenement entities.
     *
     * @Route("/", name="agenda_evenement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agenda_evenements = $em->getRepository('BackBundle:Agenda_evenement')->findAll();

        return $this->render('agenda_evenement/index.html.twig', array(
            'agenda_evenements' => $agenda_evenements,
        ));
    }

    /**
     * Creates a new agenda_evenement entity.
     *
     * @Route("/new", name="agenda_evenement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agenda_evenement = new Agenda_evenement();
        $form = $this->createForm('BackBundle\Form\Agenda_evenementType', $agenda_evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agenda_evenement);
            $em->flush($agenda_evenement);

            return $this->redirectToRoute('agenda_evenement_show', array('id' => $agenda_evenement->getId()));
        }

        return $this->render('agenda_evenement/new.html.twig', array(
            'agenda_evenement' => $agenda_evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agenda_evenement entity.
     *
     * @Route("/{id}", name="agenda_evenement_show")
     * @Method("GET")
     */
    public function showAction(Agenda_evenement $agenda_evenement)
    {
        $deleteForm = $this->createDeleteForm($agenda_evenement);

        return $this->render('agenda_evenement/show.html.twig', array(
            'agenda_evenement' => $agenda_evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agenda_evenement entity.
     *
     * @Route("/{id}/edit", name="agenda_evenement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Agenda_evenement $agenda_evenement)
    {
        $deleteForm = $this->createDeleteForm($agenda_evenement);
        $editForm = $this->createForm('BackBundle\Form\Agenda_evenementType', $agenda_evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agenda_evenement_edit', array('id' => $agenda_evenement->getId()));
        }

        return $this->render('agenda_evenement/edit.html.twig', array(
            'agenda_evenement' => $agenda_evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agenda_evenement entity.
     *
     * @Route("/{id}", name="agenda_evenement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Agenda_evenement $agenda_evenement)
    {
        $form = $this->createDeleteForm($agenda_evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agenda_evenement);
            $em->flush($agenda_evenement);
        }

        return $this->redirectToRoute('agenda_evenement_index');
    }

    /**
     * Creates a form to delete a agenda_evenement entity.
     *
     * @param Agenda_evenement $agenda_evenement The agenda_evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agenda_evenement $agenda_evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agenda_evenement_delete', array('id' => $agenda_evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
