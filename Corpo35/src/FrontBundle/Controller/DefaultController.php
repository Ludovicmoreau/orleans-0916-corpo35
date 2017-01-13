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

    public function translationAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig', array(

        ));
    }

}
