<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository;
use App\Entity\Departement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        //create form from ContactType
        $form = $this->createForm(ContactType::class);

        $message = (new \Swift_Message('Nouveau mail'))
        ->setFrom('sender@mail.xyz')
        ->setTo('receiver@mail.xyz')
        ->setBody(
            'hello',
            'text/html'
        )
    ;

    $mailer->send($message);

        return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
