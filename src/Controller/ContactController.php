<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, ContactService $contactService): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérification anti-spam (honeypot)
            if ($contact->getWebsite() !== null && $contact->getWebsite() !== '') {
                // C'est probablement un bot, on ignore silencieusement
                $this->addFlash('success', 'Votre message a été envoyé avec succès !');
                return $this->redirectToRoute('app_contact');
            }

            try {
                // Envoi de l'email
                $contactService->sendContactEmail($contact);
                
                // Message de succès
                $this->addFlash('success', 'Votre message a été envoyé avec succès ! Je vous répondrai dans les plus brefs délais.');
                
                // Redirection pour éviter la soumission multiple du formulaire
                return $this->redirectToRoute('app_contact');
            } catch (\Exception $e) {
                // En cas d'erreur
                $this->addFlash('danger', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer ultérieurement.');
            }
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }
}