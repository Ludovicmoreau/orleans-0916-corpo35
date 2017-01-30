<?php

namespace FrontBundle\Controller;

use BackBundle\Entity\Candidat;
use BackBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CandidatsChoisisController extends Controller
{
    /**
     * @Route("/candidatschoisis", name="candidats_choisis")
     */
    public function ShowCandidatsChoisisAction()
    {
        $em = $this->getDoctrine()->getManager();
        $promotion = $em->getRepository('BackBundle:Promotion')->findOneByEncours(1);
        return $this->redirectToRoute('promotion_annee', array(
            'id' => $promotion->getId(),
            ))
        ;
    }

    /**
     * @Route("/pagevitrinecandidat/{id}", name="page_vitrine_candidat")
     */
    public function ShowPageVitrineCandidatAction(Candidat $candidat)
    {
        if ($candidat->getDecision()==0) {
            return $this->redirectToRoute('index');
        } else {
        return $this->render('FrontBundle:Default:page_vitrine_candidat.html.twig', array(
            'candidat' => $candidat,
        ));
        }
    }
}
