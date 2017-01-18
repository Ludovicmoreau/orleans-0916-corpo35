<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Commentaire;
use BlogBundle\Entity\Article;

class PageController extends Controller
{
    /**
     * @Route("/", name="blog")
     */
    public function BlogAction($limit = 3, $offset = null)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('BlogBundle:Article')->findBy(array(), null, $limit, $offset);
        return $this->render('BlogBundle:Default:article.html.twig', array(
            'articles'=>$articles,
        ));

    }

    /**
     * @Route("/Articles", name="list_article")
     */
    public function ArticleAction()
    {
        $em = $this->getDoctrine()->getManager($limit = null, $offset = 3);
        $listArticles = $em->getRepository('BlogBundle:Article')->findBy(array(), null, $limit, $offset);

        return $this->render('BlogBundle:Default:listArticle.html.twig', array(
            'listArticles'=>$listArticles,

        ));
    }

    /**
     * @Route("/pageArticle/{id}", name="page_article")
     */
    public function ShowContentArticleAction(Article $article)
    {

        return $this->render('BlogBundle:Default:newComment.html.twig', array(
            'article'=>$article,

        ));

    }

    /**
     * @Route("/post-commentaire/{id}", name="post-commentaire")
     */
    public function PostCommentAction(Article $article)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaires = $em->getRepository('BlogBundle:Commentaire');

        return $this->render('BlogBundle:Default:newComment.html.twig', array(
            'commentaires' => $commentaires,

        ));

    }

    /**
     * Creates a new commentaire entity.
     *
     * @Route("/new-comment/{id}", name="new-comment")
     */
    public function NewCommentAction(Article $article, Request $request)
    {
        $commentaire = new Commentaire();
        $commentaire->setArticle($article);

        $form = $this->createForm('BlogBundle\Form\CommentaireType', $commentaire);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (!$commentaire->getAuteur()) {
                $commentaire->setAuteur('Anonyme');
            }

            //  $hashtag = $this->get('blog.hashtag');
            // $commentaire->setDate($hashtag->setWrite());

            $em->persist($commentaire);
            $em->flush($commentaire);

            return $this->redirectToRoute('new-comment', array('id' => $article->getId()));
        }
        return $this->render('BlogBundle:Default:newComment.html.twig', array(
            'commentaire' => $commentaire,
            'article' => $article,
            'form' => $form->createView(),
        ));
    }
}


