<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Swift_Mailer;
use Swift_Message;
use FrontBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * contact controller.
 *
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * Creates a new contact message
     * @Route("/", name="contact")
     *
     */
    public function contactAction(Request $request)
    {
        $formContact = $this->createForm(\FrontBundle\Form\ContactType::class);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
                $nom = $formContact["nom"]->getData();
                $prenom = $formContact["prenom"]->getData();
                $email = $formContact["email"]->getData();
                $message = $formContact["message"]->getData();


                // create the message
                $message = \Swift_Message::newInstance()
                    ->setSubject('Mail envoyé depuis votre site Corpo35')
                    ->setFrom(array('contactcorpo35@gmail.com' => 'Un visiteur'))
                    ->setTo(array('contactcorpo35@gmail.com' => 'Corpo35'))
                    ->setCharset('UTF-8')
                    ->setContentType('text/html')
                    ->setBody(
                        $this->renderView('FrontBundle:Default:email.html.twig'
                            , array('formContact' => $formContact,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'message' => $message,
                            )
                        ));
                // send mail


                $this->get('mailer')->send($message);
                $this->get('session')
                    ->getFlashBag()
                    ->add('success', 'Votre message à bien été envoyé. Nous vous ferons un retour dans les plus brefs délais. Merci!');


            return $this->redirectToRoute('contact');
        }

        return $this->render('FrontBundle:Default:contact.html.twig',[
            'formContact'=>$formContact->createView(),
        ]);
    }
}
