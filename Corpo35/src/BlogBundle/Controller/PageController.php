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
        return $this->render('BlogBundle:Default:pageArticle.html.twig', array(
            'article'=>$article
        ));

    }

    /**
     * @Route("/post-commentaire", name="post-commentaire")
     */
    public function ShowCommentAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listCommentaires = $em->getRepository('BlogBundle:Commentaire')->findAll();
        return $this->render('BlogBundle:Default:post-commentaire.html.twig', array(
            'listCommentaires' => $listCommentaires
        ));

    }






}


