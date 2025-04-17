<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank(message="Veuillez saisir votre nom")
     * @Assert\Length(min=2, max=100, minMessage="Votre nom doit comporter au moins {{ limit }} caractères", maxMessage="Votre nom ne peut pas dépasser {{ limit }} caractères")
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="Veuillez saisir votre email")
     * @Assert\Email(message="L'email '{{ value }}' n'est pas valide")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Veuillez saisir un sujet")
     * @Assert\Length(min=5, max=100, minMessage="Le sujet doit comporter au moins {{ limit }} caractères", maxMessage="Le sujet ne peut pas dépasser {{ limit }} caractères")
     */
    private $sujet;

    /**
     * @Assert\NotBlank(message="Veuillez saisir votre message")
     * @Assert\Length(min=10, minMessage="Votre message doit comporter au moins {{ limit }} caractères")
     */
    private $message;

    /**
     * Champ honeypot pour la protection anti-spam
     */
    private $website;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }
}