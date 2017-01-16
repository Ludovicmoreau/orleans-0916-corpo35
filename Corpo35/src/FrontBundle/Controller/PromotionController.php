<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackBundle\Entity\Promotion;
use BackBundle\Entity\Candidat;


class PromotionController extends Controller
{
    /**
     * @Route("/promotion", name="promotion")
     */
    public function promotionAction()
    {
        return $this->render('FrontBundle:Default:promotion.html.twig');
    }
}