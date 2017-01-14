<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackBundle\Entity\Commentaire;
use BackBundle\Entity\Article;

class PostCommentaireController extends Controller
{
     /**
     * @Route("/post-commentaire", name="post-commentaire")
     */
    public function ShowCommentAction()
    {
       $em = $this->getDoctrine()->getManager();
        $listCommentaires = $em->getRepository('BackBundle:Commentaire')->findAll();
        return $this->render('FrontBundle:Default:post-commentaire.html.twig', array(
            'listCommentaires' => $listCommentaires
        ));

    }


}