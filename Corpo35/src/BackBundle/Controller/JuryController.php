<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Jury;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Jury controller.
 *
 * @Route("/jury")
 */
class JuryController extends Controller
{
    /**
     * Lists all jury entities.
     *
     * @Route("/", name="jury_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $juries = $em->getRepository('BackBundle:Jury')->findAll();

        return $this->render('jury/index.html.twig', array(
            'juries' => $juries,
        ));
    }

    /**
     * Creates a new jury entity.
     *
     * @Route("/new", name="jury_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $jury = new Jury();
        $form = $this->createForm('BackBundle\Form\JuryType', $jury);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jury);
            $em->flush($jury);

            return $this->redirectToRoute('jury_show', array('id' => $jury->getId()));
        }

        return $this->render('jury/new.html.twig', array(
            'jury' => $jury,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jury entity.
     *
     * @Route("/{id}", name="jury_show")
     * @Method("GET")
     */
    public function showAction(Jury $jury)
    {
        $deleteForm = $this->createDeleteForm($jury);

        return $this->render('jury/show.html.twig', array(
            'jury' => $jury,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jury entity.
     *
     * @Route("/{id}/edit", name="jury_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Jury $jury)
    {
        $deleteForm = $this->createDeleteForm($jury);
        $editForm = $this->createForm('BackBundle\Form\JuryType', $jury);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jury_edit', array('id' => $jury->getId()));
        }

        return $this->render('jury/edit.html.twig', array(
            'jury' => $jury,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jury entity.
     *
     * @Route("/{id}", name="jury_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Jury $jury)
    {
        $form = $this->createDeleteForm($jury);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jury);
            $em->flush($jury);
        }

        return $this->redirectToRoute('jury_index');
    }

    /**
     * Creates a form to delete a jury entity.
     *
     * @param Jury $jury The jury entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jury $jury)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jury_delete', array('id' => $jury->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
