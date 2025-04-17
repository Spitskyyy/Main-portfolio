<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

class ContactService
{
    private $mailer;
    private $emailTo;
    private $emailFrom;

    public function __construct(MailerInterface $mailer, string $emailTo = null, string $emailFrom = null)
    {
        $this->mailer = $mailer;
        // Valeurs par défaut si non définies dans services.yaml
        $this->emailTo = $emailTo ?? 'emeric.grall@orange.fr';
        $this->emailFrom = $emailFrom ?? 'emeric.grall@orange.fr';
    }

    public function sendContactEmail(Contact $contact): void
    {
        $email = (new Email())
            ->from(new Address($this->emailFrom, 'Portfolio Contact'))
            ->to($this->emailTo)
            ->replyTo($contact->getEmail())
            ->subject('Nouveau message de contact: ' . $contact->getSujet())
            ->html($this->createEmailBody($contact));

        $this->mailer->send($email);
    }

    private function createEmailBody(Contact $contact): string
    {
        return "
            <h1>Nouveau message de contact</h1>
            <p><strong>De:</strong> {$contact->getNom()} ({$contact->getEmail()})</p>
            <p><strong>Sujet:</strong> {$contact->getSujet()}</p>
            <hr>
            <h2>Message:</h2>
            <p>" . nl2br(htmlspecialchars($contact->getMessage())) . "</p>
        ";
    }
}