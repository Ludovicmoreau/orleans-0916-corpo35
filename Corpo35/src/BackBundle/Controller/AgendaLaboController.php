<?php

namespace BackBundle\Controller;

use BackBundle\Entity\AgendaLabo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Agendalabo controller.
 *
 * @Route("agendalabo")
 */
class AgendaLaboController extends Controller
{
    /**
     * Lists all agendaLabo entities.
     *
     * @Route("/", name="agendalabo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agendaLabos = $em->getRepository('BackBundle:AgendaLabo')->findAll();

        return $this->render('agendalabo/index.html.twig', array(
            'agendaLabos' => $agendaLabos,
        ));
    }

    /**
     * Creates a new agendaLabo entity.
     *
     * @Route("/new", name="agendalabo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agendaLabo = new Agendalabo();
        $form = $this->createForm('BackBundle\Form\AgendaLaboType', $agendaLabo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agendaLabo);
            $em->flush($agendaLabo);

            return $this->redirectToRoute('agendalabo_show', array('id' => $agendaLabo->getId()));
        }

        return $this->render('agendalabo/new.html.twig', array(
            'agendaLabo' => $agendaLabo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agendaLabo entity.
     *
     * @Route("/{id}", name="agendalabo_show")
     * @Method("GET")
     */
    public function showAction(AgendaLabo $agendaLabo)
    {
        $deleteForm = $this->createDeleteForm($agendaLabo);

        return $this->render('agendalabo/show.html.twig', array(
            'agendaLabo' => $agendaLabo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agendaLabo entity.
     *
     * @Route("/{id}/edit", name="agendalabo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AgendaLabo $agendaLabo)
    {
        $deleteForm = $this->createDeleteForm($agendaLabo);
        $editForm = $this->createForm('BackBundle\Form\AgendaLaboType', $agendaLabo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agendalabo_edit', array('id' => $agendaLabo->getId()));
        }

        return $this->render('agendalabo/edit.html.twig', array(
            'agendaLabo' => $agendaLabo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agendaLabo entity.
     *
     * @Route("/{id}", name="agendalabo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AgendaLabo $agendaLabo)
    {
        $form = $this->createDeleteForm($agendaLabo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agendaLabo);
            $em->flush($agendaLabo);
        }

        return $this->redirectToRoute('agendalabo_index');
    }

    /**
     * Creates a form to delete a agendaLabo entity.
     *
     * @param AgendaLabo $agendaLabo The agendaLabo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AgendaLabo $agendaLabo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agendalabo_delete', array('id' => $agendaLabo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
