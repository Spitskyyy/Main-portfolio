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
        // Compétences en réseau et infrastructure (priorité SISR)
        $competencesReseau = [
            [
                'nom' => 'TCP/IP & Routage',
                'niveau' => 85,
                'icone' => 'fas fa-network-wired',
                'couleur' => 'primary',
                'description' => 'Configuration et dépannage de réseaux TCP/IP, sous-réseaux, routage statique et dynamique.'
            ],
            [
                'nom' => 'Cisco (Routeurs & Switchs)',
                'niveau' => 80,
                'icone' => 'fas fa-server',
                'couleur' => 'info',
                'description' => 'Configuration de routeurs et commutateurs Cisco, VLANs, ACLs, STP, routage inter-VLAN.'
            ],
            [
                'nom' => 'Windows Server',
                'niveau' => 85,
                'icone' => 'fab fa-windows',
                'couleur' => 'primary',
                'description' => 'Administration de Windows Server 2019/2022, Active Directory, GPO, DNS, DHCP, DFS.'
            ],
            [
                'nom' => 'Linux (Debian/Ubuntu)',
                'niveau' => 90,
                'icone' => 'fab fa-linux',
                'couleur' => 'warning',
                'description' => 'Administration de serveurs Linux, shell scripting (Bash), services réseau, Apache, Nginx.'
            ],
            [
                'nom' => 'Virtualisation',
                'niveau' => 80,
                'icone' => 'fas fa-cloud',
                'couleur' => 'success',
                'description' => 'Mise en place d\'environnements virtualisés avec VMware ESXi, Proxmox, VirtualBox, Docker.'
            ],
            [
                'nom' => 'Services Réseau',
                'niveau' => 85,
                'icone' => 'fas fa-sitemap',
                'couleur' => 'danger',
                'description' => 'Déploiement et maintenance de services : DNS, DHCP, FTP, SSH, VPN, Proxy.'
            ],
            [
                'nom' => 'Supervision & Monitoring',
                'niveau' => 75,
                'icone' => 'fas fa-chart-line',
                'couleur' => 'info',
                'description' => 'Mise en place de solutions de supervision : GLPI, Zabbix, Nagios, SNMP.'
            ],
            [
                'nom' => 'Pare-feu & VPN',
                'niveau' => 70,
                'icone' => 'fas fa-shield-alt',
                'couleur' => 'danger',
                'description' => 'Configuration de pare-feu (pfSense, iptables), règles de filtrage, NAT, VPN IPSec/OpenVPN.'
            ]
        ];
        
        // Compétences en cybersécurité
        $competencesCyber = [
            [
                'nom' => 'Sécurité des systèmes',
                'niveau' => 80,
                'icone' => 'fas fa-lock',
                'couleur' => 'danger',
                'description' => 'Hardening des systèmes, gestion des correctifs, politiques de sécurité.'
            ],
            [
                'nom' => 'Cryptographie & PKI',
                'niveau' => 70,
                'icone' => 'fas fa-key',
                'couleur' => 'warning',
                'description' => 'Mise en œuvre de solutions de chiffrement, PKI, certificats SSL/TLS, HTTPS.'
            ],
            [
                'nom' => 'Analyse de vulnérabilités',
                'niveau' => 65,
                'icone' => 'fas fa-bug',
                'couleur' => 'info',
                'description' => 'Utilisation d\'outils d\'audit (Nmap, Wireshark), détection d\'intrusions.'
            ],
            [
                'nom' => 'Sécurité réseau',
                'niveau' => 80,
                'icone' => 'fas fa-shield-alt',
                'couleur' => 'primary',
                'description' => 'Mise en place de solutions de sécurité réseau, IDS/IPS, segmentation, DMZ.'
            ],
            [
                'nom' => 'RGPD & Conformité',
                'niveau' => 85,
                'icone' => 'fas fa-file-contract',
                'couleur' => 'success',
                'description' => 'Conformité RGPD, protection des données personnelles, audits de sécurité.'
            ],
            [
                'nom' => 'Gestion des incidents',
                'niveau' => 70,
                'icone' => 'fas fa-exclamation-triangle',
                'couleur' => 'warning',
                'description' => 'Procédures de réponse aux incidents, analyse de logs, PRA/PCA.'
            ]
        ];

        // Compétences en développement (secondaire - acquis en SLAM)
        $competencesDev = [
            [
                'nom' => 'Scripting (Bash/PowerShell)',
                'niveau' => 80,
                'icone' => 'fas fa-terminal',
                'couleur' => 'dark',
                'description' => 'Automatisation des tâches d\'administration avec Bash et PowerShell.'
            ],
            [
                'nom' => 'PHP/Symfony',
                'niveau' => 75,
                'icone' => 'fab fa-php',
                'couleur' => 'primary',
                'description' => 'Développement d\'applications web avec PHP et le framework Symfony.'
            ],
            [
                'nom' => 'HTML/CSS/JavaScript',
                'niveau' => 80,
                'icone' => 'fab fa-html5',
                'couleur' => 'danger',
                'description' => 'Création de sites web responsive et interfaces utilisateur.'
            ],
            [
                'nom' => 'SQL',
                'niveau' => 75,
                'icone' => 'fas fa-database',
                'couleur' => 'info',
                'description' => 'Conception et administration de bases de données MySQL, MariaDB, PostgreSQL.'
            ],
            [
                'nom' => 'Git',
                'niveau' => 85,
                'icone' => 'fab fa-git-alt',
                'couleur' => 'dark',
                'description' => 'Gestion de versions avec Git, GitHub, GitLab, branches, merge requests.'
            ],
            [
                'nom' => 'Python',
                'niveau' => 60,
                'icone' => 'fab fa-python',
                'couleur' => 'warning',
                'description' => 'Scripts d\'automatisation et outils de sécurité en Python.'
            ]
        ];

        return $this->render('competences/index.html.twig', [
            'competencesDev' => $competencesDev,
            'competencesReseau' => $competencesReseau,
            'competencesCyber' => $competencesCyber,
        ]);
    }
}
