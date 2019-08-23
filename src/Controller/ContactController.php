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
    public function contact(Request $request, \Swift_Mailer $mailer, $departement)
    {
        //create form from ContactType
        $form = $this->createForm(ContactType::class);

        $message = (new \Swift_Message('Nouveau mail'))
        ->setFrom('sender@mail.xyz')
        ->setTo($departement[0]["email"])
        ->setBody(
            $this->renderView(
            // templates/emails/registration.html.twig
                'templates/contact/mail.html.twig', [
                    'form' => $form,
                    'departement' => $departement
                ]
            ),
            'text/html'
        );

    $mailer->send($message);

        return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }
}
