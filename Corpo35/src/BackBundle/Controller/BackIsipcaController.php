<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BackIsipcaController extends Controller
{
    /**
     * @Route("/", name="backIsipca")
     */
    public function JuryAction()
    {
        return $this->render('BackBundle:Default:BackIsipca.html.twig');
    }
}
