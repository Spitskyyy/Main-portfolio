<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/veille-numerique')]
class VeilleController extends AbstractController
{
    #[Route('/', name: 'app_veille')]
    public function index(): Response
    {
        // Veille numérique orientée SISR (Infrastructure, Systèmes, Réseaux, Cybersécurité)
        // 2 sujets par mois de septembre 2025 à juin 2026.
        $veilleMonths = [
            [
                'period' => 'Septembre 2025',
                'articles' => [
                    [
                        'title' => 'Faille critique dans Cisco IOS XE activement exploitée',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-shield-halved',
                        'date' => '12 septembre 2025',
                        'source' => 'LeMagIT',
                        'summary' => "Une vulnérabilité critique affectant l'interface web de Cisco IOS XE permet à un attaquant de créer un compte privilégié et de prendre le contrôle de l'équipement. Cet article rappelle l'importance de désactiver les interfaces d'administration exposées sur Internet et d'appliquer rapidement les correctifs sur les équipements réseau.",
                        'link' => 'https://www.lemagit.fr/actualites/cybersecurite',
                    ],
                    [
                        'title' => 'Windows Server 2025 : nouveautés pour les administrateurs',
                        'category' => 'Systèmes',
                        'color' => 'primary',
                        'icon' => 'fa-server',
                        'date' => '24 septembre 2025',
                        'source' => 'IT-Connect',
                        'summary' => "Tour d'horizon des nouveautés de Windows Server 2025 : améliorations d'Active Directory, hotpatching sans redémarrage, optimisation de Hyper-V et renforcement de la sécurité par défaut. Un article utile pour comprendre les évolutions de l'administration système en environnement Microsoft.",
                        'link' => 'https://www.it-connect.fr/category/systeme/windows-server/',
                    ],
                ],
            ],
            [
                'period' => 'Octobre 2025',
                'articles' => [
                    [
                        'title' => 'Ransomware : les bonnes pratiques de protection en entreprise',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-lock',
                        'date' => '8 octobre 2025',
                        'source' => 'ANSSI',
                        'summary' => "Le guide de l'ANSSI détaille les mesures essentielles pour se prémunir contre les rançongiciels : sauvegardes hors ligne (règle 3-2-1), segmentation du réseau, gestion des privilèges et sensibilisation des utilisateurs. Une ressource clé pour bâtir une politique de sécurité solide.",
                        'link' => 'https://cyber.gouv.fr/publications',
                    ],
                    [
                        'title' => 'Proxmox VE 9 : la virtualisation open source progresse',
                        'category' => 'Virtualisation',
                        'color' => 'success',
                        'icon' => 'fa-cloud',
                        'date' => '21 octobre 2025',
                        'source' => 'Proxmox',
                        'summary' => "La nouvelle version de Proxmox VE apporte une gestion améliorée des clusters, le support des dernières versions du noyau Linux et de meilleures performances de stockage avec Ceph. Une alternative crédible à VMware pour les infrastructures virtualisées.",
                        'link' => 'https://www.proxmox.com/en/about/company-details/press-releases',
                    ],
                ],
            ],
            [
                'period' => 'Novembre 2025',
                'articles' => [
                    [
                        'title' => 'Vulnérabilité Fortinet : mise à jour urgente des pare-feux',
                        'category' => 'Réseaux',
                        'color' => 'info',
                        'icon' => 'fa-network-wired',
                        'date' => '6 novembre 2025',
                        'source' => 'Bleeping Computer',
                        'summary' => "Une faille touchant les équipements FortiGate permet un contournement d'authentification. L'article insiste sur la nécessité de maintenir à jour les pare-feux, de restreindre l'accès aux interfaces de gestion et de surveiller les journaux pour détecter toute activité suspecte.",
                        'link' => 'https://www.bleepingcomputer.com/tag/fortinet/',
                    ],
                    [
                        'title' => 'Déploiement d\'IPv6 : où en est-on en 2025 ?',
                        'category' => 'Réseaux',
                        'color' => 'info',
                        'icon' => 'fa-diagram-project',
                        'date' => '19 novembre 2025',
                        'source' => 'ARCEP',
                        'summary' => "Le baromètre annuel fait le point sur l'adoption d'IPv6 en France. L'article explique les enjeux de la transition, le mécanisme de double pile (dual-stack) et les bénéfices d'IPv6 face à l'épuisement des adresses IPv4. Essentiel pour comprendre l'évolution de l'adressage réseau.",
                        'link' => 'https://www.arcep.fr/cartes-et-donnees/nos-publications-chiffrees/transition-ipv6.html',
                    ],
                ],
            ],
            [
                'period' => 'Décembre 2025',
                'articles' => [
                    [
                        'title' => 'Directive NIS2 : quelles obligations pour les entreprises ?',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-file-shield',
                        'date' => '4 décembre 2025',
                        'source' => 'LeMagIT',
                        'summary' => "La directive européenne NIS2 étend les obligations de cybersécurité à de nombreux secteurs. L'article décrit les exigences en matière de gestion des risques, de notification des incidents et de responsabilité des dirigeants. Un sujet majeur pour la conformité des SI.",
                        'link' => 'https://www.lemagit.fr/actualites/cybersecurite',
                    ],
                    [
                        'title' => 'Sécuriser Active Directory : Tiering et bonnes pratiques',
                        'category' => 'Systèmes',
                        'color' => 'primary',
                        'icon' => 'fa-sitemap',
                        'date' => '18 décembre 2025',
                        'source' => 'IT-Connect',
                        'summary' => "Active Directory reste la cible privilégiée des attaquants. Cet article présente le modèle de Tiering (séparation des niveaux d'administration), la protection des comptes à privilèges et l'audit des configurations avec des outils comme PingCastle.",
                        'link' => 'https://www.it-connect.fr/cours-tutoriels/administration-systeme/active-directory/',
                    ],
                ],
            ],
            [
                'period' => 'Janvier 2026',
                'articles' => [
                    [
                        'title' => 'Le modèle Zero Trust s\'impose dans les architectures réseau',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-user-shield',
                        'date' => '9 janvier 2026',
                        'source' => 'ZDNet',
                        'summary' => "Le Zero Trust repose sur le principe « ne jamais faire confiance, toujours vérifier ». L'article explique comment l'authentification forte, la micro-segmentation et la vérification continue remplacent progressivement le modèle de sécurité périmétrique traditionnel.",
                        'link' => 'https://www.zdnet.fr/actualites/securite-it/',
                    ],
                    [
                        'title' => 'Après le rachat par Broadcom : alternatives à VMware',
                        'category' => 'Virtualisation',
                        'color' => 'success',
                        'icon' => 'fa-server',
                        'date' => '23 janvier 2026',
                        'source' => 'LeMagIT',
                        'summary' => "La hausse des tarifs VMware pousse les entreprises à explorer d'autres solutions de virtualisation : Proxmox, Hyper-V, Nutanix ou XCP-ng. L'article compare les options et les enjeux de migration pour les infrastructures existantes.",
                        'link' => 'https://www.lemagit.fr/actualites/virtualisation',
                    ],
                ],
            ],
            [
                'period' => 'Février 2026',
                'articles' => [
                    [
                        'title' => 'Attaques DDoS : des records de volume battus',
                        'category' => 'Réseaux',
                        'color' => 'info',
                        'icon' => 'fa-bolt',
                        'date' => '7 février 2026',
                        'source' => 'Cloudflare',
                        'summary' => "Le rapport trimestriel de Cloudflare révèle des attaques par déni de service distribué d'une ampleur inédite. L'article détaille les techniques d'atténuation (filtrage, scrubbing, anycast) et l'importance d'une protection en amont pour garantir la disponibilité des services.",
                        'link' => 'https://blog.cloudflare.com/tag/ddos/',
                    ],
                    [
                        'title' => 'Nouveautés du noyau Linux pour l\'administration serveur',
                        'category' => 'Systèmes',
                        'color' => 'primary',
                        'icon' => 'fa-terminal',
                        'date' => '20 février 2026',
                        'source' => 'It\'s FOSS',
                        'summary' => "Les dernières versions du noyau Linux apportent des améliorations de performances, une meilleure prise en charge matérielle et des renforcements de sécurité. Un article qui aide à comprendre l'évolution des serveurs Linux en production.",
                        'link' => 'https://news.itsfoss.com/tag/linux/',
                    ],
                ],
            ],
            [
                'period' => 'Mars 2026',
                'articles' => [
                    [
                        'title' => 'Cloud souverain : les enjeux pour les données européennes',
                        'category' => 'Cloud',
                        'color' => 'success',
                        'icon' => 'fa-cloud-arrow-up',
                        'date' => '6 mars 2026',
                        'source' => 'Numerama',
                        'summary' => "Face aux lois extraterritoriales américaines, le cloud souverain vise à garantir la maîtrise des données sensibles. L'article présente les certifications (SecNumCloud), les acteurs européens et les compromis entre souveraineté, coût et fonctionnalités.",
                        'link' => 'https://www.numerama.com/tag/cloud/',
                    ],
                    [
                        'title' => 'WiFi 7 : ce que la nouvelle norme change pour les réseaux',
                        'category' => 'Réseaux',
                        'color' => 'info',
                        'icon' => 'fa-wifi',
                        'date' => '19 mars 2026',
                        'source' => 'Clubic',
                        'summary' => "Le WiFi 7 (802.11be) promet des débits multi-gigabit et une latence réduite grâce au Multi-Link Operation et aux canaux de 320 MHz. L'article explique les apports concrets pour les infrastructures réseau d'entreprise et les points d'attention au déploiement.",
                        'link' => 'https://www.clubic.com/wifi/',
                    ],
                ],
            ],
            [
                'period' => 'Avril 2026',
                'articles' => [
                    [
                        'title' => 'L\'IA au service de la détection des cybermenaces',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-robot',
                        'date' => '10 avril 2026',
                        'source' => 'ZDNet',
                        'summary' => "Les solutions de sécurité intègrent de plus en plus l'intelligence artificielle pour détecter les comportements anormaux et automatiser la réponse aux incidents. L'article aborde les apports des SOC modernes et les limites de ces technologies (faux positifs, IA offensive).",
                        'link' => 'https://www.zdnet.fr/actualites/securite-it/',
                    ],
                    [
                        'title' => 'PRA / PCA : construire un plan de reprise efficace',
                        'category' => 'Systèmes',
                        'color' => 'primary',
                        'icon' => 'fa-database',
                        'date' => '24 avril 2026',
                        'source' => 'IT-Connect',
                        'summary' => "Un Plan de Reprise d'Activité bien conçu permet de redémarrer le SI après un sinistre. L'article détaille les notions de RTO et RPO, les stratégies de sauvegarde (3-2-1), la réplication et l'importance des tests réguliers de restauration.",
                        'link' => 'https://www.it-connect.fr/cours-tutoriels/administration-systeme/',
                    ],
                ],
            ],
            [
                'period' => 'Mai 2026',
                'articles' => [
                    [
                        'title' => 'Tests d\'intrusion : méthodologie et outils essentiels',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-bug',
                        'date' => '8 mai 2026',
                        'source' => 'IT-Connect',
                        'summary' => "Le pentest permet d'évaluer la résistance d'un SI face à une attaque. L'article présente les phases (reconnaissance, scan, exploitation, rapport) et les outils incontournables comme Nmap, Wireshark, Metasploit et Burp Suite.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
                    ],
                    [
                        'title' => 'Sécuriser les conteneurs et Kubernetes en production',
                        'category' => 'Cloud',
                        'color' => 'success',
                        'icon' => 'fa-cubes',
                        'date' => '22 mai 2026',
                        'source' => 'LeMagIT',
                        'summary' => "La conteneurisation transforme le déploiement applicatif mais introduit de nouveaux risques. L'article aborde la sécurité des images, la gestion des secrets, les politiques réseau et le durcissement des clusters Kubernetes.",
                        'link' => 'https://www.lemagit.fr/actualites/conteneurs',
                    ],
                ],
            ],
            [
                'period' => 'Juin 2026',
                'articles' => [
                    [
                        'title' => 'RGPD : retour sur les sanctions et la conformité des SI',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-file-contract',
                        'date' => '5 juin 2026',
                        'source' => 'CNIL',
                        'summary' => "La CNIL fait le bilan des contrôles et sanctions liés au RGPD. L'article rappelle les obligations de sécurité des données personnelles, la tenue d'un registre des traitements et les mesures techniques (chiffrement, journalisation, contrôle d'accès).",
                        'link' => 'https://www.cnil.fr/fr/les-sanctions-prononcees-par-la-cnil',
                    ],
                    [
                        'title' => 'SD-WAN : moderniser l\'interconnexion des sites distants',
                        'category' => 'Réseaux',
                        'color' => 'info',
                        'icon' => 'fa-route',
                        'date' => '18 juin 2026',
                        'source' => 'LeMagIT',
                        'summary' => "Le SD-WAN apporte de la flexibilité dans la gestion des liaisons WAN en pilotant le trafic par logiciel. L'article explique les bénéfices (optimisation des coûts, sécurité, qualité de service) face aux architectures MPLS traditionnelles.",
                        'link' => 'https://www.lemagit.fr/actualites/reseaux',
                    ],
                ],
            ],
        ];

        // Plateformes et outils de veille technologique
        $veillePlatforms = [
            [
                'name' => 'Feedly',
                'url' => 'https://feedly.com/',
                'description' => 'Agrégateur de flux RSS pour suivre facilement de nombreuses sources.',
                'icon' => 'fa-rss',
                'iconType' => 'fas',
                'color' => 'primary',
            ],
            [
                'name' => 'ANSSI',
                'url' => 'https://cyber.gouv.fr/',
                'description' => 'Agence nationale de la sécurité des systèmes d\'information : alertes et guides.',
                'icon' => 'fa-shield-halved',
                'iconType' => 'fas',
                'color' => 'danger',
            ],
            [
                'name' => 'LeMagIT',
                'url' => 'https://www.lemagit.fr/',
                'description' => 'Actualité IT professionnelle : infrastructure, réseaux et cybersécurité.',
                'icon' => 'fa-newspaper',
                'iconType' => 'fas',
                'color' => 'info',
            ],
            [
                'name' => 'IT-Connect',
                'url' => 'https://www.it-connect.fr/',
                'description' => 'Tutoriels et actualités d\'administration systèmes et réseaux.',
                'icon' => 'fa-server',
                'iconType' => 'fas',
                'color' => 'success',
            ],
            [
                'name' => 'Google Alerts',
                'url' => 'https://www.google.fr/alerts',
                'description' => 'Notifications par email sur des mots-clés et sujets techniques précis.',
                'icon' => 'fa-bell',
                'iconType' => 'fas',
                'color' => 'warning',
            ],
            [
                'name' => 'Reddit (r/sysadmin)',
                'url' => 'https://www.reddit.com/r/sysadmin/',
                'description' => 'Communauté d\'administrateurs systèmes et réseaux.',
                'icon' => 'fa-reddit',
                'iconType' => 'fab',
                'color' => 'danger',
            ],
        ];

        return $this->render('veille/index.html.twig', [
            'veilleMonths' => $veilleMonths,
            'veillePlatforms' => $veillePlatforms,
        ]);
    }
}
