<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function ShowArticleAction($limit = 3, $offset = null)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('BackBundle:Article')->findBy(array(), null, $limit, $offset);
        return $this->render('FrontBundle:Default:article.html.twig', array(
            'articles'=>$articles,
        ));

    }



}
