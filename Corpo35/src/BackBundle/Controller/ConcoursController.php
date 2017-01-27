<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Concours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Concour controller.
 *
 * @Route("concours")
 */
class ConcoursController extends Controller
{
    /**
     * Lists all concour entities.
     *
     * @Route("/", name="concours_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $concours = $em->getRepository('BackBundle:Concours')->findAll();

        return $this->render('concours/index.html.twig', array(
            'concours' => $concours,
        ));
    }

    /**
     * Creates a new concour entity.
     *
     * @Route("/new", name="concours_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $concours = new Concours();
        $form = $this->createForm('BackBundle\Form\ConcoursType', $concours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($concours);
            $em->flush($concours);

            return $this->redirectToRoute('concours_show', array('id' => $concours->getId()));
        }

        return $this->render('concours/new.html.twig', array(
            'concour' => $concours,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a concour entity.
     *
     * @Route("/{id}", name="concours_show")
     * @Method("GET")
     */
    public function showAction(Concours $concours)
    {
        $deleteForm = $this->createDeleteForm($concours);

        return $this->render('concours/show.html.twig', array(
            'concour' => $concours,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing concour entity.
     *
     * @Route("/{id}/edit", name="concours_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Concours $concours)
    {
        $deleteForm = $this->createDeleteForm($concours);
        $editForm = $this->createForm('BackBundle\Form\ConcoursType', $concours);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concours_edit', array('id' => $concours->getId()));
        }

        return $this->render('concours/edit.html.twig', array(
            'concour' => $concours,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a concour entity.
     *
     * @Route("/{id}", name="concours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Concours $concours)
    {
        $form = $this->createDeleteForm($concours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concours);
            $em->flush($concours);
        }

        return $this->redirectToRoute('concours_index');
    }

    /**
     * Creates a form to delete a concour entity.
     *
     * @param Concours $concour The concour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Concours $concours)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concours_delete', array('id' => $concours->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
