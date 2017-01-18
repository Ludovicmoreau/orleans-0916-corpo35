<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="backHeader")
     */
    public function indexAction()
    {
        return $this->render('BackBundle:Default:backHeader.html.twig');
    }

    /**
     * @Route("/", name="backJury")
     */
    public function JuryAction()
    {
        return $this->render('BackBundle:Default:BackJury.html.twig');
    }


}
