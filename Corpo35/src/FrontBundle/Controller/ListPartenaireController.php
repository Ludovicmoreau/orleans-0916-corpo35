<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListPartenaireController extends Controller
{
    /**
     * @Route("/listPartenaire", name="list_partenaire")
     */
    public function ShowPartenaireAction()
        {
            $em = $this->getDoctrine()->getManager();
            $listPartenaires = $em->getRepository('BackBundle:Partenaire')->findAll();
            return $this->render('FrontBundle:Default:listPartenaire.html.twig', array(
                'partenaire' => $listPartenaires
            ));
    }


}


