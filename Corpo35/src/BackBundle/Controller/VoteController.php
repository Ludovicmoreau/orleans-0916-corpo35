<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Vote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\Tests\Compiler\C;
use Symfony\Component\HttpFoundation\Request;
use BackBundle\Entity\Candidat;

/**
 * Vote controller.
 *
 * @Route("vote")
 */
class VoteController extends Controller
{
    /**
     * Lists all vote entities.
     *
     * @Route("/", name="vote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $votes = $em->getRepository('BackBundle:Vote')->findAll();

        return $this->render('vote/index.html.twig', array(
            'votes' => $votes,
        ));
    }

    /**
     * Creates a new vote entity.
     *
     * @Route("/new", name="vote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vote = new Vote();
        $form = $this->createForm('BackBundle\Form\VoteType', $vote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vote);
            $em->flush();

            return $this->redirectToRoute('vote_show', array(
                'id' => $vote->getId(),
            ));
        }

        return $this->render('vote/new.html.twig', array(
            'vote' => $vote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vote entity.
     *
     * @Route("/{id}", name="vote_show")
     * @Method("GET")
     */
    public function showAction(Vote $vote)
    {
        $deleteForm = $this->createDeleteForm($vote);

        return $this->render('vote/show.html.twig', array(
            'vote' => $vote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vote entity.
     *
     * @Route("/{id}/edit", name="vote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vote $vote)
    {
        $deleteForm = $this->createDeleteForm($vote);
        $editForm = $this->createForm('BackBundle\Form\VoteType', $vote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vote_edit', array('id' => $vote->getId()));
        }

        return $this->render('vote/edit.html.twig', array(
            'vote' => $vote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vote entity.
     *
     * @Route("/{id}", name="vote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vote $vote)
    {
        $form = $this->createDeleteForm($vote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vote);
            $em->flush($vote);
        }

        return $this->redirectToRoute('vote_index');
    }

    /**
     * Creates a form to delete a vote entity.
     *
     * @param Vote $vote The vote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vote $vote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vote_delete', array('id' => $vote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     *
     * @Route("/vote/{id}/{typeVote}", name="vote")
     *
     */

    public function voteAction(Candidat $candidat, $typeVote)
    {
        $em = $this->getDoctrine()->getManager();
        $vote = New Vote();
        $note = 0;

        if ($typeVote=='positif') {
            $note = 1;
        } elseif ($typeVote=='negatif'){
            $note = -1;
        } elseif ($typeVote=='neutre'){
            $note = 0;
        }

        $vote->setNote($note);
        $vote->setUser($this->getUser());

        $candidats = $em->getRepository('BackBundle:Candidat')->findById($candidat);
        $vote->setCandidat($candidat);
        $candidat -> addVote($vote);

        $em->persist($vote);
        $em->flush();

        return $this->render('candidat/index.html.twig', array(
            'candidats' => $candidats,
            'vote' => $vote,
            'note' => $note,
        ));

    }
}
