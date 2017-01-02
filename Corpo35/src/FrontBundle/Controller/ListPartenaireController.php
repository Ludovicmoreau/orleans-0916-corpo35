<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListPartenaireController extends Controller
{
    /**
     * @Route("/listPartenaires", name="list_partenaire")
     */
    public function ShowPartenaireAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listPartenaires = $em->getRepository('BackBundle:Partenaire')->findAll();
        return $this->render('FrontBundle:Default:listPartenaire.html.twig', array(
            'listPartenaires'=>$listPartenaires
        ));

    }
    /**
     * @Route("/listLogo", name="list_logo")
     */
    public function ShowLogoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listLogos = $em->getRepository('BackBundle:Partenaire')->findAll();
        return $this->render('FrontBundle:Default:list_logo.html.twig', array(
            'listPartenaires'=>$listLogos
        ));

    }
}


