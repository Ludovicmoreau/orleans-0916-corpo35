<?php

namespace FrontBundle\Controller;

use BackBundle\Entity\Reglement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class ReglementController extends Controller
{
    /**
     * @Route("/reglement", name="reglement")
     */
    public function showReglementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reglement = $em->getRepository('BackBundle:Reglement')->findAll();
        return $this->render('FrontBundle:Default:reglement.html.twig', [
            'reglement' => $reglement,
        ]);
    }


    /**
     * Export to PDF
     *
     * @Route("/reglement/pdf", name="reglement_pdf")
     */
    public function pdfAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reglement = $em->getRepository('BackBundle:Reglement')->findAll();

        $html = $this->renderView('FrontBundle:Default:reglement_pdf.html.twig', array(
            'reglement' => $reglement
        ));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="file.pdf"'
            )
        );

    }
}