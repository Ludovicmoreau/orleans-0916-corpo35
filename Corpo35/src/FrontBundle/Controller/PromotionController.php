<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackBundle\Entity\Promotion;

class PromotionController extends Controller
{
    public function promotionAction()
    {
        return $this->render('FrontBundle:Default:promotion.html.twig');
    }
}