<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjectController extends AbstractController
{
    #[Route('/projet', name: 'app_project')]
    public function index(): Response
    {
    $projects = [
        [
            'id' => 1,
            'title' => 'Stage Direct',
            'description' => 'Application web développée avec Symfony permettant la gestion des stages.',
            'image' => '/fichier/logo_stage-direct.png',
            'tags' => ['Symfony', 'PHP', 'TWIG', 'MariaDB', 'Tailwind', 'Git'],
            'githubLink' => 'https://github.com/Spitskyyy/stage-direct-final',
            'docLink' => 'https://kdrive.infomaniak.com/app/share/842951/3b222404-55ba-45b9-95b3-75ef5180104c',
        ],
        [
            'id' => 2,
            'title' => 'Dolibarr et Atedi',
            'description' => 'Amélioration et mise en place de Dolibarr et Atedi pour un client en collaboration avec les SISR',
            'image' => '/fichier/dolibarr.png',
            'tags' => ['Symfony', 'JavaScript', 'MariaDB', 'API', 'Git'],
            'githubLink' => 'https://github.com/Spitskyyy/Atedi_2024-final',
            'docLink' => 'https://kdrive.infomaniak.com/app/share/842951/6d1d52cc-bc98-47a9-92f9-639269f658d2',
        ],
        [
            'id' => 3,
            'title' => 'Lueur du Mont',
            'description' => 'Site web vitrine pour la mini-entreprise des premieres',
            'image' => '/fichier/lueur.png',
            'tags' => ['HTML', 'CSS', 'JavaScript', 'Git',],
            'githubLink' => 'https://github.com/Spitskyyy/Lueur-du-Mont',
            'demoLink' => '#',
        ],
        [
            'id' => 4,
            'title' => 'TC-bois',
            'description' => 'Application web développée avec PHP permettant la gestion des stocks de l\'entreprise et la pub.',
            'image' => '/fichier/stage.png',
            'tags' => ['HTML', 'CSS', 'PHP', 'JavaScript', 'Git',],
            'githubLink' => 'https://github.com/Spitskyyy/tc-bois',
        ],
        [
            'id' => 5,
            'title' => 'Patines et moi',
            'description' => 'Application web développée avec Synfony permettant la pub de l\'entreprise.',
            'image' => '/fichier/stage2.png',
            'tags' => ['Synfony', 'Tailwind', 'TWIG', 'JavaScript', 'MariaDB', 'Git'],
            'githubLink' => 'https://github.com/Spitskyyy/stage-patinesetmoi',
        ],
    ];
    
    return $this->render('project/index.html.twig', [
        'projects' => $projects,
    ]);
}

}