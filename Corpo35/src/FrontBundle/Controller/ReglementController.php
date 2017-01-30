<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReglementController extends Controller
{
    /**
     * @Route("/reglement", name="reglement")
     */
    public function showReglementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reglement = $em->getRepository('BackBundle:Reglement')->findAll();
        return $this->render('FrontBundle:Default:reglement.html.twig', [
            'reglement' => $reglement,
        ]);
    }
}
