<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController extends Controller
{
    /**
     * Creates a new commentaire entity.
     *
     * @Route("/post-commentaire/{id}", name="post-commentaire")
     */
    public function newPostCommentaireAction(Article $article, Request $request)
    {
        $commentaire = new Commentaire();
        $commentaire->setArticle($article);

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

            return $this->redirectToRoute('commentaire_show', array('id' => $article->getId()));
        }
        return $this->render('FrontBundle:Default:listArticle.html.twig', array(
            'commentaire' => $commentaire,
            'article' => $article,
            'form' => $form->createView(),
        ));
    }
}


