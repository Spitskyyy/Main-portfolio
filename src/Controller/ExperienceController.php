<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{
    #[Route('/experience', name: 'app_experience')]
    public function index(): Response
    {
        $experiences = [
            [
                'id'          => 1,
                'company'     => 'Startup XYZ',
                'logo'        => '',
                'position'    => 'Développeur Web',
                'period'      => 'Février 2025 - Mars 2025',
                'location'    => 'Avranches, France',
                'description' => 'Stage de fin de deuxieme année.',
                'tasks'       => [
                    'Développement du site WEB',
                    'Mise en place d\'une base de données',
                    'Intégration de templates responsive',
                ],
                'skills'      => ['Synfony', 'MySQL', 'Agile/Scrum', 'Bootstrap'],
            ],

            [
                'id'          => 2,
                'company'     => 'TC-Bois',
                'logo'        => '',
                'position'    => 'Développeur Web',
                'period'      => 'Mai 2024 - Juin 2024',
                'location'    => 'Avranches, France',
                'description' => 'Stage de fin de première année.',
                'tasks'       => [
                    'Développement du site WEB',
                    'Mise en place d\'une base de données',
                    'Intégration de templates responsive',
                ],
                'skills'      => ['PHP', 'MySQL', 'Git', 'Bootstrap'],
            ],

            [
                'id'          => 3,
                'company'     => 'IUT de Saint-Malo',
                'logo'        => '',
                'position'    => 'Stagiaire au Service informatique',
                'period'      => 'Janvier 2023 - Mars 2023 & Mars 2024 - Avril 2022',
                'location'    => 'Saint-Malo, France',
                'description' => 'Stage de fin de Premiere & terminale.',
                'tasks'       => [
                    'Création images Windows 10 avec FOG',
                    'Création d\'un script pour la maj de GLPI',
                    'Mise en place du service Zabbix',
                ],
                'skills'      => ['Linux', 'VMware vSphere', 'GLPI', 'FOG'],
            ],
        ];

        return $this->render('experience/index.html.twig', [
            'experiences' => $experiences,
        ]);
    }
}
