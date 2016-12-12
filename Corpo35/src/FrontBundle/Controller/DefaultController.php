<?php

namespace FrontBundle\Controller;

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
     * @Route("/blog", name="blog")
     */
    public function blogAction()
    {
        return $this->render('FrontBundle:Default:blog.html.twig');
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
}


