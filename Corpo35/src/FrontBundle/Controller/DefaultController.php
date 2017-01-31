<?php

namespace FrontBundle\Controller;

use BackBundle\Entity\Candidat;
use BackBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/sitemap", name="sitemap")
     */
    public function siteMapAction()
    {
        return $this->render('FrontBundle:Default:sitemap.xml.twig');
    }


    /**
     * Export to PDF
     *
     * @Route("/reglement/pdf", name="reglement_pdf")
     */
    public function pdfAction()
    {
        $html = $this->renderView('FrontBundle:Default:reglement_pdf.html.twig', array(

        ));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );

    }
}
