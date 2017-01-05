<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class Agenda_evenementController extends Controller
{
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
}
