<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackBundle\Entity\Partenaire;

class FrontPartenaireController extends Controller
{
    /**
     * @Route("/partenaires", name="list_partenaire")
     */
    public function ShowPartenaireAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listPartenaires = $em->getRepository('BackBundle:Partenaire')->findAll();
        return $this->render('FrontBundle:Default:listPartenaire.html.twig', array(
            'listPartenaires'=>$listPartenaires
        ));

    }
    /**
     * @Route("/listLogo", name="list_logo")
     */
    public function ShowLogoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listLogos = $em->getRepository('BackBundle:Partenaire')->findAll();
        return $this->render('FrontBundle:Default:list_logo.html.twig', array(
            'listPartenaires'=>$listLogos
        ));

    }


    /**
     * @Route("/partenaires/{id}", name="page_partenaire")
     */
    public function PartenaireAction(Partenaire $id)
    {
        $em = $this->getDoctrine()->getManager();

        $partenaires = $em ->getRepository('BackBundle:Partenaire')
            ->find($id);

        $em ->persist($partenaires);
        $em ->flush();
        return $this->render('FrontBundle:Default:partenaire.html.twig', array(
            'partenaire'=>$partenaires
        ));
    }


}


