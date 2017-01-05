<?php

namespace FrontBundle\Controller;

use BackBundle\Entity\Candidat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction()
    {
        return $this->render('FrontBundle:Default:inscription.html.twig');
    }

    /**
     * @Route("/reglement", name="reglement")
     */
    public function reglementAction()
    {
        return $this->render('FrontBundle:Default:reglement.html.twig');

    }

    /**
     * @Route("/laureats", name="laureats")
     */
    public function laureatsAction()
    {
        return $this->render('FrontBundle:Default:laureats.html.twig');

    }

    /**
     * @Route("/archives", name="archives")
     */
    public function archivesAction()
    {
        return $this->render('FrontBundle:Default:archives.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('FrontBundle:Default:contact.html.twig');
    }

    /**
     * @Route("/candidatenavant", name="candidatenavant")
     */
    public function miseEnAvantAction()
    {
        $em = $this->getDoctrine()->getManager();
        $candidat = $em
                        ->getRepository('BackBundle:Candidat')

                         ->findOneByMiseEnAvant(true)
        ;


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
        $oldCandidat = $em
            ->getRepository('BackBundle:Candidat')
            ->findOneByMiseEnAvant(true);
        $oldCandidat ->setMiseEnAvant(false);

            $em->persist($oldCandidat);



        $candidat = $em
            ->getRepository('BackBundle:Candidat')
            ->find($id);

        $candidat ->setMiseEnAvant(true);

            $em->persist($candidat);

        $em->flush();

        return $this->render('FrontBundle:Default:index.html.twig', array(
            'candidat' => $candidat,
        ));

    }

    /**
     * @Route("/agenda_labo", name="agenda_labo")
     * @Route("/listAgenda_labo", name="list_agenda_labo")
     */
    public function ShowAgendaLaboAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listAgendas = $em->getRepository('BackBundle:Agenda_Labo')->findAll();
        return $this->render('FrontBundle:Default:agenda_labo.html.twig', array(
            'listAgendas' => $listAgendas
        ));
    }

    /**
     * @Route("/listAgenda_evenement", name="list_agenda_evenement")
     */
    public function ShowAgendaEvenementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listAgendas = $em->getRepository('BackBundle:Agenda_evenement')->findAll();
        return $this->render('FrontBundle:Default:agenda_evenement.html.twig', array(
            'listAgendas' => $listAgendas

        ));
    }

    /**
     * @Route("/laureats", name="laureats")
     */
    public function ShowCandidatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listCandidat = $em->getRepository('BackBundle:Candidat')->findAll();
        return $this->render('FrontBundle:Default:laureats.html.twig', array(
            'listCandidat' => $listCandidat
        ));
    }

    /**
     * @Route("/revuedepresse", name="revuedepresse")
     */
    public function ShowRpresseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listRpresse = $em->getRepository('BackBundle:Rpresse')->findAll();
        return $this->render('FrontBundle:Default:revuedepresse.html.twig', array(
            'listRpresse' => $listRpresse
        ));

    }
}
