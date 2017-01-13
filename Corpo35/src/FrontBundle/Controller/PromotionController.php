<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackBundle\Entity\Promotion;
use BackBundle\Entity\Candidat;

class PromotionController extends Controller
{
    /**
     * @Route("/archives", name="archives")
     */
    public function prmotionCandidatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $promotionCandidat = $em->getRepository('BackBundle:Promotion')->findByAnnee(2016);
        return $this->render('FrontBundle:Default:archives.html.twig', array(
            'promotionCandidat' => $promotionCandidat
        ));
    }

//    /**
//     * @param Candidat $promotion_id
//     * @return mixed
//     */
//    public function archiveCreationAction(Candidat $promotion_id)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $newPromotion = $em->getRepository('BackBundle:Candidat')->findByPromotion(+1);
//        return $this->render('FrontBundle:Default:archives.html.twig', array(
//            'newPromotion' => $newPromotion
//        ));
//    }
}