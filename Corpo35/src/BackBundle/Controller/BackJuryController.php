<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BackJuryController extends Controller
{
    /**
     * @Route("/", name="backJury")
     */
    public function JuryAction()
    {
        return $this->render('BackBundle:Default:BackJury.html.twig');
    }
}
