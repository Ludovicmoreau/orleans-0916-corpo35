<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RpresseController extends Controller
{
    /**
     * @Route("/revuedepresse", name="revuedepresse")
     */
    public function rPresseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listRpresse = $em->getRepository('BackBundle:Rpresse')->findAll();
        return $this->render('FrontBundle:Default:revuedepresse.html.twig', array(
            'listRpresse' => $listRpresse
        ));
    }
}