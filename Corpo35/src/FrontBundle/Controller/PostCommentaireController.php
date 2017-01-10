<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostCommentaireController extends Controller
{
    /**
     * @Route("/post-commentaire", name="list_commentaire")
     */
    public function ShowCommentaireAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listCommentaires = $em->getRepository('BackBundle:Commentaire')->findAll();
        return $this->render('FrontBundle:Default:post-commentaire.html.twig', array(
            'listCommentaires'=>$listCommentaires
        ));

    }

    /**
     * Creates a new commentaire entity.
     *
     * @Route("/post-commentaire/{id}", name="commentaire_newembed")
     */
    public function newCommentaireAction(Article $article, Request $request)
    {
        $commentaire = new Commentaire();
        $commentaire->setAlbum($article);

        $form = $this->createForm('BackBundle\Form\CommentaireType', $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (!$commentaire->getUtilisateur()) {
                $commentaire->setUtilisateur('Anonyme');
            }

            // $commentaire->setDate($hashtag->setWrite());
            $commentaire->setDate(date('Y-m-d'));
            $em->persist($commentaire);
            $em->flush($commentaire);

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }
        return $this->render('FrontBundle:Default:post-commentaire.html.twig', array(
            'commentaire' => $commentaire,
            'article' => $article,
            'form' => $form->createView(),
        ));
    }


}


