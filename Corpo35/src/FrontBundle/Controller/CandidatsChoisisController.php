<?php

namespace FrontBundle\Controller;

use BackBundle\Entity\Candidat;
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
        $candidatsChoisis = $em ->getRepository('BackBundle:Candidat')->findByDecision(1);
        return $this->render('FrontBundle:Default:laureats.html.twig', array(
            'candidatsChoisis' => $candidatsChoisis,
        ));
    }

    /**
     * @Route("/candidatschoisisinfos/{id}", name="candidatschoisisinfos")
     */
    public function ShowCandidatsChoisisInfosAction(Candidat $id)
    {
        $em = $this->getDoctrine()->getManager();
//        $oldCandidatsChoisis = $em ->getRepository('BackBundle:Candidat')->findByDecision(1);
//        $oldCandidatsChoisis ->setShowCandidatsChoisis(0);
//        $em->persist($oldCandidatsChoisis);

        $candidat = $em ->getRepository('BackBundle:Candidat')->find($id);
//        $candidatsChoisisInfos ->setShowCandidatsChoisis(1);
//        $em ->persist($candidatsChoisisInfos);
//        $em ->flush();
        if ($candidat->getDecision()==0) {
            //erreur
            // flashBag
            // return redirectToRoute('accueil')
        }
        return $this->render('FrontBundle:Default:candidatschoisis.html.twig', array(
            'candidat' => $candidat,
        ));
    }
}
