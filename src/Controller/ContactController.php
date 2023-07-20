<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contactForm = $this->createForm(ContactType::class);

        $contactForm->handleRequest($request);


        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();


            $email = (new Email())
                ->from($data['email'])
                ->to('brocaliande@gmail.com')
                ->subject('Demande de contact')
                ->html($this->renderView('members/contact_email.html.twig', [
                    'email' => $data['email'],
                    'contenu' => $data['content']
                ]));

            $mailer->send($email);
            $this->addFlash('Succès', 'Votre Message a été envoyé avec succès');
            return $this->redirectToRoute('membersHome');
        }
        return $this->render('members/contact.html.twig', [
            'contactForm' => $contactForm->createView()]);
    }
}
