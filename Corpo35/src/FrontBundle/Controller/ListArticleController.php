<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use BackBundle\Entity\Commentaire;
use BackBundle\Entity\Article;

class ListArticleController extends Controller
{
    /**
     * @Route("/Articles", name="list_article")
     */
    public function ShowArticleAction()
    {
        $em = $this->getDoctrine()->getManager($limit = null, $offset = 3);
        $listArticles = $em->getRepository('BackBundle:Article')->findBy(array(), null, $limit, $offset);

        return $this->render('FrontBundle:Default:listArticle.html.twig', array(
            'listArticles'=>$listArticles,

        ));
    }

    /**
     * @Route("/pageArticle/{id}", name="page_article")
     */
    public function ShowContentArticleAction(Article $article)
    {
        return $this->render('FrontBundle:Default:pageArticle.html.twig', array(
            'article'=>$article
        ));

    }

    public function ShowCommentAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listCommentaires = $em->getRepository('BackBundle:Commentaire')->findAll();
        return $this->render('FrontBundle:Default:post-commentaire.html.twig', array(
            'listCommentaires' => $listCommentaires
        ));

    }
}


