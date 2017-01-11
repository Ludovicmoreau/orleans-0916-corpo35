<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListArticleController extends Controller
{
    /**
     * @Route("/listArticles", name="list_article")
     */
    public function ShowArticleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listArticles = $em->getRepository('BackBundle:Article')->findall();
        return $this->render('FrontBundle:Default:listArticle.html.twig', array(
            'listArticles'=>$listArticles
        ));

    }

}


