<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CertificationController extends AbstractController
{
    #[Route('/certification', name: 'app_certification')]
    public function index(): Response
    {
        $certifications = [
            [
                'id' => 1,
                'title' => 'Les bases du matériel informatique',
                'score' => 'Fini',
                'date' => 'Février 2025',
                'issuer' => 'netacad',
                'description' => 'Certification sur les bases du matériel informatique.',
                'image' => '/fichier/computerBasics.png',
                'fullImage' => '/fichier/computerBasics.png',
                'officialLink' => 'https://www.netacad.com', 
            ],
            [
                'id' => 2,
                'title' => 'Module de Cybersécurité',
                'score' => 'Fini',
                'date' => 'Février 2025',
                'issuer' => 'ANSSI',
                'description' => 'Certification pour agir efficacement sur la protection de vos outils numériques.',
                'image' => '/fichier/secNumCertif.png',
                'fullImage' => '/fichier/secNumCertif.png',
                'officialLink' => 'https://secnumacademie.gouv.fr',
            ],
            [
                'id' => 3,
                'title' => 'Learn CSS',
                'score' => 'Fini',
                'date' => 'Mai 2025',
                'issuer' => 'codecademy',
                'description' => 'Certification d\'apprentisage de CSS.',
                'image' => '/fichier/JavaScript&Css.png',
                'fullImage' => '/fichier/JavaScript&Css.png',
                'officialLink' => 'https://www.codecademy.com',
            ],
            [
                'id' => 4,
                'title' => 'Learn JavaScript',
                'score' => 'Fini',
                'date' => 'Avril 2025',
                'issuer' => 'codecademy',
                'description' => 'Certification d\'apprentisage du JavaScript.',
                'image' => '/fichier/JavaScript&Css.png',
                'fullImage' => '/fichier/JavaScript&Css.png',
                'officialLink' => 'https://www.codecademy.com',
            ],
            [
                'id' => 5,
                'title' => 'Introduction à la Cybersécurité',
                'score' => 'En cours',
                'date' => 'Février 2025',
                'issuer' => 'netacad',
                'description' => 'Certification pour agir efficacement sur la protection de vos outils numériques.',
                'image' => '/fichier/cisco.png',
                'fullImage' => '/fichier/cisco.png',
                'officialLink' => 'https://www.netacad.com',
            ],
            [
                'id' => 6,
                'title' => 'PIX',
                'score' => 'Score: 527/896',
                'date' => 'février 2025',
                'issuer' => 'Ministère de l\'Éducation Nationale',
                'description' => 'Certification des compétences numériques.',
                'image' => '/fichier/Pix_logo.png',
                'fullImage' => '/fichier/Pix_logo.png',
                'officialLink' => 'https://pix.fr/',
            ],
        ];
        
        return $this->render('certification/index.html.twig', [
            'certifications' => $certifications,
        ]);
    }
}
