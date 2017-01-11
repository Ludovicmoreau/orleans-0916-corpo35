<?php

namespace FrontBundle\Controller;


use BackBundle\Entity\Candidat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CandidatEnAvantController extends Controller
{
    /**
     * @Route("/candidatenavant", name="candidatenavant")
     */
    public function miseEnAvantAction()
    {
        $em = $this->getDoctrine()->getManager();
        $candidat = $em ->getRepository('BackBundle:Candidat')
            ->findOneByMiseEnAvant(true);
        return $this->render('FrontBundle:Default:candidatenavant.html.twig', array(
            'candidat' => $candidat,
        ));
    }

    /**
     * @Route("/recandidatenavant/{id}", name="recandidatenavant")
     */
    public function RemiseEnAvantAction(Candidat $id)
    {
        $em = $this->getDoctrine()->getManager();
        $oldCandidat = $em ->getRepository('BackBundle:Candidat')
            ->findOneByMiseEnAvant(true);
        $oldCandidat ->setMiseEnAvant(false);
        $em->persist($oldCandidat);
        $candidat = $em ->getRepository('BackBundle:Candidat')
            ->find($id);
        $candidat ->setMiseEnAvant(true);
        $em ->persist($candidat);
        $em ->flush();
        return $this->render('FrontBundle:Default:index.html.twig', array(
            'candidat' => $candidat,
        ));
    }
}
