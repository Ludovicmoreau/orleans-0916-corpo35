<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BackPartenaireController extends Controller
{
    /**
     * @Route("/", name="backPartenaire")
     */
    public function JuryAction()
    {
        return $this->render('BackBundle:Default:BackPartenaire.html.twig');
    }
}
