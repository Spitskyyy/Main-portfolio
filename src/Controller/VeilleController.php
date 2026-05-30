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
        // Veille numérique orientée Cybersécurité (BTS SIO SISR)
        // 2 sujets de cybersécurité par mois de septembre 2025 à juin 2026.
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
                        'summary' => "Une vulnérabilité critique affectant l'interface web de Cisco IOS XE permet à un attaquant de créer un compte privilégié et de prendre le contrôle de l'équipement. Cet article rappelle l'importance de désactiver les interfaces d'administration exposées sur Internet et d'appliquer rapidement les correctifs.",
                        'link' => 'https://www.lemagit.fr/actualites/cybersecurite',
                    ],
                    [
                        'title' => 'Phishing : les nouvelles techniques de contournement du MFA',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-fish',
                        'date' => '25 septembre 2025',
                        'source' => 'IT-Connect',
                        'summary' => "Les attaques de phishing évoluent pour contourner l'authentification multifacteur grâce à des kits de proxy inverse (AiTM) qui volent les jetons de session. L'article explique le fonctionnement de ces attaques et les parades : clés FIDO2, sensibilisation et surveillance des connexions.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
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
                        'title' => 'Vulnérabilité Fortinet : mise à jour urgente des pare-feux',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-fire',
                        'date' => '22 octobre 2025',
                        'source' => 'Bleeping Computer',
                        'summary' => "Une faille touchant les équipements FortiGate permet un contournement d'authentification exploité par des attaquants. L'article insiste sur la nécessité de maintenir à jour les pare-feux, de restreindre l'accès aux interfaces de gestion et de surveiller les journaux pour détecter toute activité suspecte.",
                        'link' => 'https://www.bleepingcomputer.com/tag/fortinet/',
                    ],
                ],
            ],
            [
                'period' => 'Novembre 2025',
                'articles' => [
                    [
                        'title' => 'Sécuriser Active Directory : Tiering et bonnes pratiques',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-sitemap',
                        'date' => '6 novembre 2025',
                        'source' => 'IT-Connect',
                        'summary' => "Active Directory reste la cible privilégiée des attaquants. Cet article présente le modèle de Tiering (séparation des niveaux d'administration), la protection des comptes à privilèges et l'audit des configurations avec des outils comme PingCastle.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
                    ],
                    [
                        'title' => 'Gestion des mots de passe : adopter un coffre-fort numérique',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-key',
                        'date' => '20 novembre 2025',
                        'source' => 'ANSSI',
                        'summary' => "L'ANSSI rappelle les recommandations en matière de gestion des mots de passe : longueur, unicité et usage d'un gestionnaire chiffré (KeePass, Bitwarden). L'article aborde aussi la fin progressive des mots de passe au profit des passkeys.",
                        'link' => 'https://cyber.gouv.fr/publications',
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
                        'title' => 'EDR / XDR : comprendre la détection et la réponse aux menaces',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-magnifying-glass-chart',
                        'date' => '17 décembre 2025',
                        'source' => 'ZDNet',
                        'summary' => "Les solutions EDR et XDR remplacent peu à peu les antivirus traditionnels en analysant le comportement des postes et serveurs. L'article explique les apports de ces outils dans la détection d'attaques avancées et leur intégration dans un SOC.",
                        'link' => 'https://www.zdnet.fr/actualites/securite-it/',
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
                        'title' => 'Chiffrement post-quantique : préparer la migration cryptographique',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-atom',
                        'date' => '23 janvier 2026',
                        'source' => 'LeMagIT',
                        'summary' => "Face à la menace des futurs ordinateurs quantiques, les nouveaux standards de cryptographie post-quantique (NIST) commencent à être déployés. L'article explique les enjeux pour les certificats, le VPN et la protection des données à long terme.",
                        'link' => 'https://www.lemagit.fr/actualites/cybersecurite',
                    ],
                ],
            ],
            [
                'period' => 'Février 2026',
                'articles' => [
                    [
                        'title' => 'Attaques DDoS : des records de volume battus',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-bolt',
                        'date' => '7 février 2026',
                        'source' => 'Cloudflare',
                        'summary' => "Le rapport trimestriel de Cloudflare révèle des attaques par déni de service distribué d'une ampleur inédite. L'article détaille les techniques d'atténuation (filtrage, scrubbing, anycast) et l'importance d'une protection en amont pour garantir la disponibilité des services.",
                        'link' => 'https://blog.cloudflare.com/tag/ddos/',
                    ],
                    [
                        'title' => 'Ingénierie sociale : la première faille reste humaine',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-user-secret',
                        'date' => '20 février 2026',
                        'source' => 'IT-Connect',
                        'summary' => "L'ingénierie sociale exploite la confiance des utilisateurs pour contourner les défenses techniques. L'article décrit les techniques courantes (prétexte, usurpation, vishing) et l'importance des campagnes de sensibilisation et de tests d'hameçonnage internes.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
                    ],
                ],
            ],
            [
                'period' => 'Mars 2026',
                'articles' => [
                    [
                        'title' => 'Sécurité du cloud : protéger ses données en environnement hébergé',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-cloud-arrow-up',
                        'date' => '6 mars 2026',
                        'source' => 'LeMagIT',
                        'summary' => "La migration vers le cloud déplace les responsabilités de sécurité. L'article présente le modèle de responsabilité partagée, la gestion des accès (IAM), le chiffrement des données et les erreurs de configuration à l'origine de nombreuses fuites.",
                        'link' => 'https://www.lemagit.fr/actualites/cybersecurite',
                    ],
                    [
                        'title' => 'Sécurité du WiFi en entreprise : WPA3 et authentification 802.1X',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-wifi',
                        'date' => '19 mars 2026',
                        'source' => 'IT-Connect',
                        'summary' => "Sécuriser un réseau sans fil professionnel passe par WPA3, l'authentification 802.1X avec un serveur RADIUS et la séparation des réseaux invités. L'article détaille les bonnes pratiques pour limiter les risques d'intrusion via le WiFi.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
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
                        'title' => 'Gestion des vulnérabilités : du scan CVE au patch management',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-bug-slash',
                        'date' => '24 avril 2026',
                        'source' => 'IT-Connect',
                        'summary' => "Identifier et corriger les failles est un processus continu. L'article présente le scoring CVSS, les scanners de vulnérabilités (OpenVAS, Nessus) et l'organisation d'un cycle de patch management efficace pour réduire la surface d'attaque.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
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
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-cubes',
                        'date' => '22 mai 2026',
                        'source' => 'LeMagIT',
                        'summary' => "La conteneurisation transforme le déploiement applicatif mais introduit de nouveaux risques. L'article aborde la sécurité des images, la gestion des secrets, les politiques réseau et le durcissement des clusters Kubernetes.",
                        'link' => 'https://www.lemagit.fr/actualites/cybersecurite',
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
                        'title' => 'PRA / PCA : assurer la résilience face aux cyberattaques',
                        'category' => 'Cybersécurité',
                        'color' => 'danger',
                        'icon' => 'fa-database',
                        'date' => '18 juin 2026',
                        'source' => 'IT-Connect',
                        'summary' => "Un Plan de Reprise d'Activité bien conçu permet de redémarrer le SI après une cyberattaque ou un sinistre. L'article détaille les notions de RTO et RPO, les stratégies de sauvegarde immuables (3-2-1) et l'importance des tests réguliers de restauration.",
                        'link' => 'https://www.it-connect.fr/category/securite/',
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
