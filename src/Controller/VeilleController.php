<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VeilleController extends AbstractController
{
    #[Route('/veille', name: 'app_veille')]
    public function index(): Response
    {
        $veilleMonths = [
                
                // ── SEPTEMBRE 2025 ────────────────────────────────────────────────
            [
                'period' => 'Septembre 2025',
                'articles' => [
                    [
                        'title'   => 'Cyberattaque contre Poitiers et Grand Poitiers : ransomware détecté le 29 août',
                        'summary' => 'Le vendredi 29 août 2025, un ransomware paralyse les réseaux de la ville de Poitiers, du Grand Poitiers et du CCAS. L\'attaque est rendue publique le 2 septembre. Les accès Internet sont immédiatement coupés, l\'ANSSI est mobilisée dès le premier jour et certains services (état civil, passeports) sont rétablis progressivement. Aucune donnée personnelle n\'est officiellement compromise ; une demande de rançon en cryptomonnaie a toutefois été formulée.',
                        'date'    => '02 sept. 2025',
                        'source'  => 'le7.info',
                        'link'    => 'https://www.le7.info/article/25955-ccas-et-ville-de-poitiers-victimes-dune-cyberattaque',
                        'category'=> 'Ransomware',
                        'icon'    => 'fa-lock',
                        'color'   => 'danger',
                    ],
                    [
                        'title'   => 'Faille zero-day WhatsApp exploitée activement en septembre 2025',
                        'summary' => 'En septembre 2025 (semaine 39), WhatsApp déploie un correctif d\'urgence pour une vulnérabilité zero-day déjà exploitée dans la nature par des groupes APT. Cette faille illustre la sophistication croissante des attaquants qui ciblent les messageries chiffrées grand public avant même que la faille ne soit connue du public. L\'incident rappelle l\'importance des mises à jour immédiates sur les applications mobiles sensibles.',
                        'date'    => '02 sept. 2025',
                        'source'  => 'formip.com',
                        'link'    => 'https://www.formip.com/pages/blog/actualite-cybersecurit%C3%A9-septembre-2025',
                        'category'=> 'Vulnérabilité',
                        'icon'    => 'fa-bug',
                        'color'   => 'warning',
                    ],
                ],
            ],

            // ── OCTOBRE 2025 ──────────────────────────────────────────────────
            [
                'period' => 'Octobre 2025',
                'articles' => [
                    [
                        'title'   => 'Mois de la cybersécurité 2025 : « Pensez cybersécurité – Aujourd\'hui pour demain »',
                        'summary' => 'Chaque année en octobre, le Mois européen de la cybersécurité sensibilise particuliers et organisations aux bonnes pratiques numériques. L\'édition 2025, lancée le 1er octobre, met en avant les gestionnaires de mots de passe, les mises à jour automatiques et la détection du phishing. Quatre semaines thématiques couvrent la sécurisation des comptes, la reconnaissance de l\'hameçonnage et la formation d\'habitudes durables.',
                        'date'    => '01 oct. 2025',
                        'source'  => 'canada.ca',
                        'link'    => 'https://www.canada.ca/fr/securite-telecommunications/nouvelles/2025/10/mois-de-la-sensibilisation-a-la-cybersecurite-2025.html',
                        'category'=> 'Sensibilisation',
                        'icon'    => 'fa-shield-halved',
                        'color'   => 'success',
                    ],
                    [
                        'title'   => 'France Travail / Kairos : 340 000 demandeurs d\'emploi exposés – annonce du 23 juillet confirmée en octobre',
                        'summary' => 'France Travail a annoncé le 23 juillet 2025 avoir détecté le 12 juillet une action malveillante sur l\'application Kairos, exposant les données (nom, prénom, date de naissance, mail, téléphone) de 340 000 demandeurs d\'emploi. L\'attaque repose sur un infostealer compromettant les identifiants d\'un organisme de formation. En octobre, une nouvelle revendication par le groupe Stormous relance l\'affaire, portant à sept le nombre total d\'incidents documentés chez France Travail depuis 2024.',
                        'date'    => '23 juil. 2025',
                        'source'  => 'lemondeinformatique.fr',
                        'link'    => 'https://www.lemondeinformatique.fr/actualites/lire-france-travail-cible-par-une-cyberattaque-exposant-340-000-comptes-97516.html',
                        'category'=> 'Fuite de données',
                        'icon'    => 'fa-database',
                        'color'   => 'danger',
                    ],
                ],
            ],

            // ── NOVEMBRE 2025 ─────────────────────────────────────────────────
            [
                'period' => 'Novembre 2025',
                'articles' => [
                    [
                        'title'   => 'Weda : cyberattaque dans la nuit du 10 au 11 novembre 2025, 23 000 soignants sans accès',
                        'summary' => 'Dans la nuit du 10 au 11 novembre 2025 vers 23h30, l\'éditeur du logiciel médical Weda (groupe Vidal) détecte une activité suspecte et coupe immédiatement l\'accès à sa plateforme. 23 000 professionnels de santé sur 85 000 utilisateurs se retrouvent privés de dossiers patients pendant près de 4 jours, revenant au papier. La reprise en mode dégradé intervient le 14 novembre. L\'intrusion proviendrait de vols d\'identifiants via malware. Weda notifie la CNIL et l\'ANSSI.',
                        'date'    => '25 nov. 2025',
                        'source'  => 'silicon.fr',
                        'link'    => 'https://www.silicon.fr/cybersecurite-1371/comment-une-cyberattaque-a-paralyse-23-000-professionnels-de-sante-224548',
                        'category'=> 'Santé',
                        'icon'    => 'fa-hospital',
                        'color'   => 'danger',
                    ],
                    [
                        'title'   => 'NIS 2 : l\'ANSSI ouvre le pré-enregistrement sur MonEspaceNIS2 le 24 novembre 2025',
                        'summary' => 'Le 24 novembre 2025, l\'ANSSI met en ligne le portail MonEspaceNIS2, permettant aux entités essentielles et importantes d\'anticiper leur futur enregistrement obligatoire. NIS 2 élargit le périmètre de NIS 1 (300 opérateurs) à plus de 15 000 entités dans 18 secteurs. La loi de transposition française, adoptée au Sénat en mars 2025, est toujours en cours d\'examen à l\'Assemblée nationale, retardée par la crise politique.',
                        'date'    => '26 nov. 2025',
                        'source'  => 'solutions-numeriques.com',
                        'link'    => 'https://www.solutions-numeriques.com/nis-2-lanssi-ouvre-le-pre-enregistrement-des-entites-concernees/',
                        'category'=> 'Réglementation',
                        'icon'    => 'fa-scale-balanced',
                        'color'   => 'primary',
                    ],
                ],
            ],

            // ── DÉCEMBRE 2025 ─────────────────────────────────────────────────
            [
                'period' => 'Décembre 2025',
                'articles' => [
                    [
                        'title'   => 'Ministère de l\'Intérieur : intrusion détectée dans la nuit du 11 au 12 décembre 2025',
                        'summary' => 'Dans la nuit du 11 au 12 décembre 2025, les serveurs de messagerie du ministère de l\'Intérieur sont compromis. Le ministre Laurent Nuñez confirme le 17 décembre l\'accès aux fichiers TAJ (17 millions de fiches judiciaires) et FPR (fichier des personnes recherchées). L\'enquête établit 72 fiches TAJ exfiltrées, ~3 000 sommaires et 10 fiches Interpol consultées. Un suspect de 22 ans est interpellé le 17 décembre et mis en examen le 20 décembre.',
                        'date'    => '17 déc. 2025',
                        'source'  => 'france24.com',
                        'link'    => 'https://www.france24.com/fr/info-en-continu/20251217-des-dizaines-de-fichiers-sensibles-du-minist%C3%A8re-de-l-int%C3%A9rieur-vol%C3%A9s-lors-d-une-attaque-informatique',
                        'category'=> 'Cyberattaque',
                        'icon'    => 'fa-bolt',
                        'color'   => 'danger',
                    ],
                    [
                        'title'   => 'DDoS massif contre La Poste et La Banque Postale : première vague le 22 décembre 2025',
                        'summary' => 'Le 22 décembre 2025, une attaque par déni de service distribué d\'ampleur exceptionnelle paralyse les services en ligne de La Banque Postale, Colissimo et Digiposte. Des milliards de tentatives de connexion par seconde sont enregistrées. Une seconde vague frappe le 1er janvier 2026, entraînant un arrêt complet du site. Ces attaques illustrent la vulnérabilité des infrastructures financières critiques face aux offensives volumétriques.',
                        'date'    => '22 déc. 2025',
                        'source'  => 'i-leadconsulting.com',
                        'link'    => 'https://www.i-leadconsulting.com/cyberattaques-france-2026/',
                        'category'=> 'DDoS',
                        'icon'    => 'fa-network-wired',
                        'color'   => 'warning',
                    ],
                ],
            ],

            // ── JANVIER 2026 ──────────────────────────────────────────────────
            [
                'period' => 'Janvier 2026',
                'articles' => [
                    [
                        'title'   => 'Baromètre CESIN 2026 publié le 27 janvier : coût de remédiation en explosion',
                        'summary' => 'Le 27 janvier 2026, le CESIN publie son 11e baromètre annuel sur la cybersécurité des entreprises françaises. Il révèle une légère baisse du nombre d\'attaques réussies, mais une explosion du coût médian de remédiation. Les RSSI s\'inquiètent en particulier du « Shadow AI » et de la complexité des architectures cloud soumises à des lois extraterritoriales comme le CLOUD Act américain.',
                        'date'    => '27 janv. 2026',
                        'source'  => 'urgencecyber-regionsud.fr',
                        'link'    => 'https://www.opinion-way.com/fr/publications/barometre-de-la-cybersecurite-des-entreprises-francaises-2026-22229/',
                        'category'=> 'Rapport',
                        'icon'    => 'fa-chart-bar',
                        'color'   => 'info',
                    ],
                    [
                        'title'   => 'Feuille de route cyber 2026-2030 présentée par le gouvernement le 29 janvier 2026',
                        'summary' => 'Le 29 janvier 2026 en Gironde, le gouvernement français dévoile sa stratégie nationale de cybersécurité pour 2026-2030, structurée autour de cinq piliers. L\'objectif affiché est de faire de la France une puissance cyber de premier rang, en renforçant la résilience des infrastructures critiques et en soutenant l\'écosystème industriel national. Les collectivités locales expriment leur besoin d\'accompagnement concret plutôt que de contraintes supplémentaires.',
                        'date'    => '29 janv. 2026',
                        'source'  => 'urgencecyber-regionsud.fr',
                        'link'    => 'https://www.sgdsn.gouv.fr/publications/strategie-nationale-de-cybersecurite-2026-2030',
                        'category'=> 'Politique',
                        'icon'    => 'fa-flag',
                        'color'   => 'primary',
                    ],
                ],
            ],

            // ── FÉVRIER 2026 ──────────────────────────────────────────────────
            [
                'period' => 'Février 2026',
                'articles' => [
                    [
                        'title'   => 'L\'IA accélère les cyberattaques : la France 2e cible en Europe selon Check Point (février 2026)',
                        'summary' => 'Un rapport Check Point publié en février 2026 place la France au rang de deuxième pays européen le plus ciblé (13 % des attaques). L\'intelligence artificielle agit comme multiplicateur de force : campagnes de phishing plus crédibles, reconnaissance accélérée, développement de malwares dopé à l\'IA. Les prompts jugés risqués ont progressé de 97 % en 2025, et 40 % des protocoles MCP analysés présentent des vulnérabilités.',
                        'date'    => '13 févr. 2026',
                        'source'  => 'siecledigital.fr',
                        'link'    => 'https://siecledigital.fr/2026/02/12/cybersecurite-2026-lia-accelere-les-attaques-la-france-en-premiere-ligne/',
                        'category'=> 'IA & Menaces',
                        'icon'    => 'fa-robot',
                        'color'   => 'warning',
                    ],
                    [
                        'title'   => 'Cegedim Santé (MonLogicielMedical) : fuite révélée le 26 février 2026, 15 millions de patients concernés',
                        'summary' => 'Le 26 février 2026, une enquête diffusée au 20h de France 2 révèle qu\'une cyberattaque survenue fin 2025 a compromis le logiciel MonLogicielMedical de Cegedim Santé. 1 500 médecins sur 3 800 sont touchés ; les données administratives de 15 millions de patients (nom, prénom, date de naissance, coordonnées) ont fuité, dont des annotations sensibles pour 164 000 personnes. Le ministère de la Santé confirme le 27 février, et le parquet de Paris ouvre une enquête.',
                        'date'    => '27 févr. 2026',
                        'source'  => 'concourspluripro.fr',
                        'link'    => 'https://www.concourspluripro.fr/parcours-de-soin/e-sante/cyberattaque-contre-cegedim-les-donnees-de-15-millions-de-patients',
                        'category'=> 'Fuite de données',
                        'icon'    => 'fa-database',
                        'color'   => 'danger',
                    ],
                    
                ],
            ],

            // ── MARS 2026 ─────────────────────────────────────────────────────
            [
                'period' => 'Mars 2026',
                'articles' => [
                    [
                        'title'   => 'FICOBA : 1,2 million de comptes bancaires consultés illégalement, révélé mi-février/mars 2026',
                        'summary' => 'Mi-février 2026, un accès illégitime au fichier national FICOBA des comptes bancaires est révélé : 1,2 million de comptes ont été consultés frauduleusement via l\'usurpation d\'identifiants d\'un fonctionnaire. Cet incident, couvert en détail en mars, s\'inscrit dans une vague inédite qui cumule plus de 100 piratages en janvier-février 2026 et plus de 60 millions de lignes de données compromises en France.',
                        'date'    => '07 mars 2026',
                        'source'  => 'generateurdemotdepasse.fr',
                        'link'    => 'https://generateurdemotdepasse.fr/blog/cyberattaques-france-fevrier-mars-2026-fuites-mots-de-passe',
                        'category'=> 'Fuite de données',
                        'icon'    => 'fa-piggy-bank',
                        'color'   => 'danger',
                    ],
                    [
                        'title'   => 'ANSSI : Panorama de la cybermenace 2025 publié le 11 mars 2026',
                        'summary' => 'Le 11 mars 2026, l\'ANSSI publie son Panorama de la cybermenace 2025 : 3 586 événements de sécurité traités (−18 % vs 2024, effet JO), dont 1 366 incidents confirmés. Les exfiltrations de données bondissent de +51 % (196 incidents). Les quatre secteurs les plus touchés sont l\'éducation et la recherche (34 %), les ministères et collectivités (24 %), la santé (10 %) et les télécoms (9 %). L\'agence alerte sur l\'effacement des frontières entre acteurs étatiques et cybercriminels.',
                        'date'    => '11 mars 2026',
                        'source'  => 'cyber.gouv.fr',
                        'link'    => 'https://cyber.gouv.fr/nous-connaitre/publications/panoramas-de-la-cybermenace/panorama-de-la-cybermenace-2025/',
                        'category'=> 'Rapport ANSSI',
                        'icon'    => 'fa-shield-halved',
                        'color'   => 'primary',
                    ],
                    
                ],
            ],

            // ── AVRIL 2026 ────────────────────────────────────────────────────
            [
                'period' => 'Avril 2026',
                'articles' => [
                    [
                        'title'   => 'ANTS (France Titres) : 11,7 à 19 millions de comptes exfiltrés via faille IDOR, 15 avril 2026',
                        'summary' => 'Le 15 avril 2026, le portail moncompte.ants.gouv.fr est victime d\'une intrusion exploitant une faille IDOR (Insecure Direct Object Reference) basique dans son API. Le hacker « breach3d » – un adolescent de 15 ans – modifie séquentiellement les identifiants de requêtes pour extraire jusqu\'à 19 millions de profils (noms, prénoms, emails, dates de naissance). Le ministère de l\'Intérieur confirme 11,7 millions de comptes le 21 avril. Le suspect est interpellé le 25 avril et mis en examen le 29 avril.',
                        'date'    => '20 avr. 2026',
                        'source'  => 'rgpdkit.fr',
                        'link'    => 'https://www.rgpdkit.fr/blog/piratage-ants-fuite-donnees-19-millions-rgpd-avril-2026',
                        'category'=> 'Vulnérabilité',
                        'icon'    => 'fa-bug',
                        'color'   => 'danger',
                    ],
                    [
                        'title'   => 'S-SDLC et DevSecOps en Europe : Enjeux actuels et perspectives d’avenir, 22 avril 2026',
                        'summary' => 'Le 21 avril 2026, l ANSSI publie une étude de marché sur le S-SDLC (sécurité du cycle de développement) et le DevSecOps en Europe. Face à l explosion des attaques sur la chaîne d approvisionnement logicielle (SolarWinds, Log4Shell) et aux nouvelles contraintes réglementaires (CRA, NIS2, DORA), l agence dresse un panorama de l offre et des besoins. Basée sur la consultation de 22 acteurs publics et privés, cette étude fournit des analyses de risques pour les chaînes CI/CD, intègre les nouveaux enjeux de l IA (MLSecOps) et livre des feuilles de route de sécurisation clés en main pour les start-ups, PME et grands groupes.',
                        'date'    => '22 avr. 2026',
                        'source'  => 'https://cyber.gouv.fr',
                        'link'    => 'https://cyber.gouv.fr/nous-connaitre/publications/etude-de-marche/etude-de-marche-s-sdlc-devsecops/',
                        'category'=> 'Vulnérabilité',
                        'icon'    => 'fa-flag',
                        'color'   => 'info',
                    ],
                ],
            ],

            // ── MAI 2026 ──────────────────────────────────────────────────────
            [
                'period' => 'Mai 2026',
                'articles' => [
                    [
                        'title'   => 'Opération Saffron : démantèlement de First VPN les 19-20 mai 2026, 33 serveurs saisis',
                        'summary' => 'Les 19 et 20 mai 2026, une opération internationale dirigée par les autorités françaises et néerlandaises (avec Europol et Eurojust) démantèle First VPN, actif depuis 2014. 33 serveurs répartis dans 27 pays sont saisis, les domaines 1vpns.com/.net/.org fermés et l\'administrateur ukrainien interpellé. Au moins 25 groupes de ransomware (dont Avaddon, Phobos) utilisaient ce service pour dissimuler leurs opérations. L\'annonce officielle tombe le 21 mai.',
                        'date'    => '21 mai 2026',
                        'source'  => 'helpnetsecurity.com',
                        'link'    => 'https://www.helpnetsecurity.com/2026/05/21/operation-saffron-first-vpn-takedown/',
                        'category'=> 'Démantèlement',
                        'icon'    => 'fa-gavel',
                        'color'   => 'success',
                    ],
                    [
                        'title'   => 'ANSSI : Publication du rapport d\'activité 2025 de l\'ANSSI',
                        'summary' => 'Le 21 avril 2026, l\'ANSSI publie une étude de marché sur le S-SDLC (sécurité du cycle de développement) et le DevSecOps en Europe. Face à l\'explosion des attaques sur la chaîne d\'approvisionnement logicielle (SolarWinds, Log4Shell) et aux nouvelles contraintes réglementaires (CRA, NIS2, DORA), l\'agence dresse un panorama de l\'offre et des besoins. Basée sur la consultation de 22 acteurs publics et privés, cette étude fournit des analyses de risques pour les chaînes CI/CD, intègre les nouveaux enjeux de l\'IA (MLSecOps) et livre des feuilles de route de sécurisation clés en main pour les start-ups, PME et grands groupes.',
                        'date'    => '4 mai 2026',
                        'source'  => 'cyber.gouv.fr',
                        'link'    => 'https://cyber.gouv.fr/actualites/publication-du-rapport-dactivite-2025-de-lanssi/',
                        'category'=> 'Alerte ANSSI',
                        'icon'    => 'fa-triangle-exclamation',
                        'color'   => 'warning',
                    ],
                ],
            ],

        ];

        $veillePlatforms = [
            [
                'name'        => 'ANSSI – cyber.gouv.fr',
                'description' => 'Alertes officielles, guides et panorama de la cybermenace publiés par l\'agence nationale française.',
                'url'         => 'https://cyber.gouv.fr/actualites/',
                'icon'        => 'fa-shield-halved',
                'iconType'    => 'fas',
                'color'       => 'primary',
            ],
            [
                'name'        => 'LeMagIT – Cybersécurité',
                'description' => 'Actualités techniques sur les vulnérabilités, incidents et solutions de sécurité.',
                'url'         => 'https://www.lemagit.fr/theme/Cybersecurite',
                'icon'        => 'fa-newspaper',
                'iconType'    => 'fas',
                'color'       => 'danger',
            ],
            [
                'name'        => 'IT-Connect',
                'description' => 'Tutoriels et actualités pour administrateurs systèmes et réseaux francophones.',
                'url'         => 'https://www.it-connect.fr',
                'icon'        => 'fa-server',
                'iconType'    => 'fas',
                'color'       => 'info',
            ],
            [
                'name'        => 'CNIL',
                'description' => 'Actualités RGPD, violations de données notifiées et recommandations de conformité.',
                'url'         => 'https://www.cnil.fr/fr/actualites',
                'icon'        => 'fa-user-shield',
                'iconType'    => 'fas',
                'color'       => 'success',
            ],
            [
                'name'        => 'Usine Digitale – Cybersécurité',
                'description' => 'Analyses approfondies des cyberattaques marquantes et retours d\'expérience.',
                'url'         => 'https://www.usine-digitale.fr/cybersecurite/',
                'icon'        => 'fa-industry',
                'iconType'    => 'fas',
                'color'       => 'warning',
            ],
            [
                'name'        => 'Siècle Digital',
                'description' => 'Veille sur les tendances IA, cybersécurité et transformation numérique.',
                'url'         => 'https://siecledigital.fr',
                'icon'        => 'fa-magnifying-glass-chart',
                'iconType'    => 'fas',
                'color'       => 'secondary',
            ],
        ];

        return $this->render('veille/index.html.twig', [
            'veilleMonths'    => $veilleMonths,
            'veillePlatforms' => $veillePlatforms,
        ]);
    }
}