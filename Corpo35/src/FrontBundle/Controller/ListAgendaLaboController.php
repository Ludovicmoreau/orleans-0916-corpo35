<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListAgendaLaboController extends Controller
{
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
}