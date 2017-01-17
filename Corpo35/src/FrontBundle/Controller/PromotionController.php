<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PromotionController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
