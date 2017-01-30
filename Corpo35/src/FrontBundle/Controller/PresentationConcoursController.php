<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PresentationConcoursController extends Controller
{
    /**
     * @Route("/presentationconcours", name="presentation_concours")
     */
    public function showPresentationConcoursAction()
    {
        $em = $this->getDoctrine()->getManager();
        $presentation = $em->getRepository('BackBundle:Presentation')->findById(1);
        return $this->render('FrontBundle:Default:concours.html.twig', [
            'presentation' => $presentation,
        ]);
    }
}
