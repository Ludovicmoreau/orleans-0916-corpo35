<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Promotion controller.
 *
 * @Route("promotion")
 */
class PromotionController extends Controller
{
    /**
     * Lists all promotion entities.
     *
     * @Route("/", name="promotion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('BackBundle:Promotion')->findAll();

        return $this->render('promotion/index.html.twig', array(
            'promotions' => $promotions,
        ));
    }

    /**
     * Creates a new promotion entity.
     *
     * @Route("/new", name="promotion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $promotion = new Promotion();
        $form = $this->createForm('BackBundle\Form\PromotionType', $promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $promotion->setEncours(0);
            $em->persist($promotion);
            $em->flush($promotion);

            return $this->redirectToRoute('promotion_show', array('id' => $promotion->getId()));
        }

        return $this->render('promotion/new.html.twig', array(
            'promotion' => $promotion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a promotion entity.
     *
     * @Route("/{id}", name="promotion_show")
     * @Method("GET")
     */
    public function showAction(Promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);

        return $this->render('promotion/show.html.twig', array(
            'promotion' => $promotion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a promotion entity.
     *
     * @param Promotion $promotion The promotion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Promotion $promotion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('promotion_delete', array('id' => $promotion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Displays a form to edit an existing promotion entity.
     *
     * @Route("/{id}/edit", name="promotion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);
        $editForm = $this->createForm('BackBundle\Form\PromotionType', $promotion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('promotion_edit', array('id' => $promotion->getId()));
        }

        return $this->render('promotion/edit.html.twig', array(
            'promotion' => $promotion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a promotion entity.
     *
     * @Route("/{id}", name="promotion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Promotion $promotion)
    {
        $form = $this->createDeleteForm($promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($promotion);
            $em->flush($promotion);
        }
        return $this->redirectToRoute('promotion_index');
    }

    /**
     *
     * Activer une promotion
     *
     * @Route("/promo-en-cours/{id}", name="passer_promotion_encours")
     */
    public function promotionEnCoursAction(Promotion $promotion)
    {
        $em = $this->getDoctrine()->getManager();
        $promotionEnCoursActual = $em->getRepository('BackBundle:Promotion')->findOneByEncours(1);
        if ($promotionEnCoursActual) {
            $promotionEnCoursActual->setEncours(0);
            $em->persist($promotionEnCoursActual);
        }

        $promotion->setEncours(1);
        $em->persist($promotion);

        $em->flush();
        return $this->redirectToRoute('promotion_index', array(

        ));
    }
}

