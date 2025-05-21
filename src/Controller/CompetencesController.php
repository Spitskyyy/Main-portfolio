<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetencesController extends AbstractController
{
    #[Route('/competences', name: 'app_competences')]
    public function index(): Response
    {
        // Compétences en développement
        $competencesDev = [
            [
                'nom' => 'PHP',
                'niveau' => 85,
                'icone' => 'fab fa-php',
                'couleur' => 'primary',
                'description' => 'Développement d\'applications web avec PHP 8, POO, MVC, API REST.'
            ],
            [
                'nom' => 'Symfony',
                'niveau' => 80,
                'icone' => 'fab fa-symfony',
                'couleur' => 'success',
                'description' => 'Création d\'applications avec Symfony 6, Doctrine ORM, Twig, formulaires.'
            ],
            [
                'nom' => 'JavaScript',
                'niveau' => 40,
                'icone' => 'fab fa-js',
                'couleur' => 'warning',
                'description' => 'Développement front-end avec JavaScript ES6+, manipulation du DOM, AJAX.'
            ],
            [
                'nom' => 'HTML/CSS',
                'niveau' => 90,
                'icone' => 'fab fa-html5',
                'couleur' => 'danger',
                'description' => 'Création de sites web responsive avec HTML5, CSS3, Flexbox, Grid.'
            ],
            [
                'nom' => 'SQL',
                'niveau' => 70,
                'icone' => 'fas fa-database',
                'couleur' => 'info',
                'description' => 'Conception et optimisation de bases de données MySQL, PostgreSQL.'
            ],
            [
                'nom' => 'Git',
                'niveau' => 98,
                'icone' => 'fab fa-git-alt',
                'couleur' => 'dark',
                'description' => 'Gestion de versions avec Git, GitHub, GitLab, branches, merge requests.'
            ],

        ];
        
        // Compétences en réseau
        $competencesReseau = [
            [
                'nom' => 'TCP/IP',
                'niveau' => 80,
                'icone' => 'fas fa-network-wired',
                'couleur' => 'primary',
                'description' => 'Configuration et dépannage de réseaux TCP/IP, sous-réseaux, routage.'
            ],
            [
                'nom' => 'Cisco',
                'niveau' => 75,
                'icone' => 'fas fa-server',
                'couleur' => 'info',
                'description' => 'Configuration de routeurs et commutateurs Cisco, VLANs, ACLs.'
            ],
            [
                'nom' => 'Windows Server',
                'niveau' => 70,
                'icone' => 'fab fa-windows',
                'couleur' => 'primary',
                'description' => 'Administration de Windows Server, Active Directory, GPO, DNS, DHCP.'
            ],
            [
                'nom' => 'Linux',
                'niveau' => 90,
                'icone' => 'fab fa-linux',
                'couleur' => 'warning',
                'description' => 'Administration de serveurs Linux, shell scripting, services réseau.'
            ],
            [
                'nom' => 'Virtualisation',
                'niveau' => 50,
                'icone' => 'fas fa-server',
                'couleur' => 'success',
                'description' => 'Mise en place d\'environnements virtualisés avec VMware, VirtualBox, Docker.'
            ],
            [
                'nom' => 'Pare-feu',
                'niveau' => 40,
                'icone' => 'fas fa-shield-alt',
                'couleur' => 'danger',
                'description' => 'Configuration de pare-feu, règles de filtrage, NAT, VPN.'
            ]
        ];
        
        // Compétences en cybersécurité
        $competencesCyber = [
            [
                'nom' => 'Sécurité Web',
                'niveau' => 70,
                'icone' => 'fas fa-lock',
                'couleur' => 'danger',
                'description' => 'Protection contre les vulnérabilités web (XSS, CSRF, injection SQL).'
            ],
            [
                'nom' => 'Cryptographie',
                'niveau' => 50,
                'icone' => 'fas fa-key',
                'couleur' => 'warning',
                'description' => 'Mise en œuvre de solutions de chiffrement, PKI, certificats SSL/TLS.'
            ],
            [
                'nom' => 'Analyse de logs',
                'niveau' => 40,
                'icone' => 'fas fa-search',
                'couleur' => 'info',
                'description' => 'Analyse de journaux de sécurité, détection d\'intrusions, SIEM.'
            ],
            [
                'nom' => 'Sécurité réseau',
                'niveau' => 80,
                'icone' => 'fas fa-shield-alt',
                'couleur' => 'primary',
                'description' => 'Mise en place de solutions de sécurité réseau, IDS/IPS, VPN.'
            ],
            [
                'nom' => 'RGPD',
                'niveau' => 80,
                'icone' => 'fas fa-file-contract',
                'couleur' => 'success',
                'description' => 'Conformité RGPD, protection des données personnelles, audits.'
            ]
        ];

        return $this->render('competences/index.html.twig', [
            'competencesDev' => $competencesDev,
            'competencesReseau' => $competencesReseau,
            'competencesCyber' => $competencesCyber,
        ]);
    }
}