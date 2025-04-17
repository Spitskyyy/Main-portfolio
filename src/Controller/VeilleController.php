<?php

namespace App\Controller;

use App\Service\RssService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/veille-numerique')]
class VeilleController extends AbstractController
{
    #[Route('/', name: 'app_veille')]
    public function index(RssService $rssService): Response
    {
        // Récupérer les catégories
        $categories = $rssService->getAllCategories();
        
        // Récupérer tous les flux RSS actifs
        $activeFeeds = $rssService->getActiveFeeds();
        
        // Déboguer les flux actifs
        $debugFeeds = [];
        foreach ($activeFeeds as $feed) {
            $debugFeeds[] = [
                'name' => $feed['name'] ?? 'Sans nom',
                'url' => $feed['url'] ?? 'Sans URL',
                'category' => $feed['category'] ?? 'Sans catégorie',
                'isActive' => $feed['isActive'] ?? false
            ];
        }
        
        // Organiser les flux par catégorie
        $feedsByCategory = $rssService->getFeedsByCategory();
        
        // Récupérer les derniers articles de tous les flux actifs
        $feedUrls = array_map(function($feed) {
            return $feed['url'];
        }, $activeFeeds);
        
        $latestArticles = [];
        $debugInfo = ['feedUrls' => $feedUrls, 'errors' => []];
        
        if (!empty($feedUrls)) {
            try {
                // Tester chaque flux individuellement
                foreach ($feedUrls as $url) {
                    try {
                        $items = $rssService->getFeedItems($url, 1);
                        $debugInfo['feeds'][$url] = [
                            'status' => 'success',
                            'count' => count($items)
                        ];
                    } catch (\Exception $e) {
                        $debugInfo['feeds'][$url] = [
                            'status' => 'error',
                            'message' => $e->getMessage()
                        ];
                        $debugInfo['errors'][] = "Erreur avec le flux $url : " . $e->getMessage();
                    }
                }
                
                // Essayer de récupérer tous les articles
                $latestArticles = $rssService->getMultipleFeedItems($feedUrls, 3, 15);
                $debugInfo['totalArticles'] = count($latestArticles);
            } catch (\Exception $e) {
                $debugInfo['errors'][] = "Erreur générale : " . $e->getMessage();
            }
        }
        
        // Récupérer les articles par catégorie
        $articlesByCategory = [];
        foreach ($categories as $category) {
            $categoryName = $category['name'];
            $categoryFeeds = array_filter($activeFeeds, function($feed) use ($categoryName) {
                return ($feed['category'] ?? '') === $categoryName;
            });
            
            if (!empty($categoryFeeds)) {
                $categoryFeedUrls = array_map(function($feed) {
                    return $feed['url'];
                }, $categoryFeeds);
                
                try {
                    $articlesByCategory[$categoryName] = $rssService->getMultipleFeedItems($categoryFeedUrls, 3, 6);
                } catch (\Exception $e) {
                    $debugInfo['errors'][] = "Erreur catégorie $categoryName : " . $e->getMessage();
                    $articlesByCategory[$categoryName] = [];
                }
            } else {
                $articlesByCategory[$categoryName] = [];
            }
        }
        
        // Plateformes de veille technologique
        $veillePlatforms = [
            [
                'id' => 1,
                'name' => 'Feedly',
                'url' => 'https://feedly.com/',
                'description' => 'Agrégateur de flux RSS permettant de suivre facilement de nombreuses sources.',
                'icon' => 'fa-rss',
                'iconType' => 'fas',
                'color' => 'primary'
            ],
            [
                'id' => 2,
                'name' => 'Google Alerts',
                'url' => 'https://www.google.fr/alerts',
                'description' => 'Service permettant de recevoir des notifications par email sur des sujets spécifiques.',
                'icon' => 'fa-bell',
                'iconType' => 'fas',
                'color' => 'warning'
            ],
            [
                'id' => 3,
                'name' => 'Twitter/X',
                'url' => 'https://twitter.com/',
                'description' => 'Suivre des experts, des entreprises et des hashtags tech pour rester informé.',
                'icon' => 'fa-twitter',
                'iconType' => 'fab',
                'color' => 'info'
            ],
            [
                'id' => 4,
                'name' => 'Reddit',
                'url' => 'https://www.reddit.com/',
                'description' => 'Communautés spécialisées (subreddits) sur différentes technologies.',
                'icon' => 'fa-reddit',
                'iconType' => 'fab',
                'color' => 'danger'
            ],
            [
                'id' => 5,
                'name' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/',
                'description' => 'Réseau professionnel avec des articles et actualités tech.',
                'icon' => 'fa-linkedin',
                'iconType' => 'fab',
                'color' => 'primary'
            ],
            [
                'id' => 6,
                'name' => 'Pocket',
                'url' => 'https://getpocket.com/',
                'description' => 'Service permettant de sauvegarder des articles pour les lire plus tard.',
                'icon' => 'fa-bookmark',
                'iconType' => 'fas',
                'color' => 'danger'
            ],
        ];
        
        return $this->render('veille/index.html.twig', [
            'categories' => $categories,
            'activeFeeds' => $activeFeeds,
            'debugFeeds' => $debugFeeds,
            'feedsByCategory' => $feedsByCategory,
            'latestArticles' => $latestArticles,
            'articlesByCategory' => $articlesByCategory,
            'veillePlatforms' => $veillePlatforms,
            'debugInfo' => $debugInfo
        ]);
    }
    
    #[Route('/feeds', name: 'app_veille_feeds')]
    public function manageFeeds(RssService $rssService): Response
    {
        $feeds = $rssService->getAllFeeds();
        $categories = $rssService->getAllCategories();
        
        return $this->render('veille/feeds.html.twig', [
            'feeds' => $feeds,
            'categories' => $categories
        ]);
    }
    
    #[Route('/feeds/new', name: 'app_veille_feed_new')]
    public function newFeed(Request $request, RssService $rssService): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $url = $request->request->get('url');
            $category = $request->request->get('category');
            $isActive = $request->request->get('is_active') === 'on';
            
            if ($name && $url) {
                $rssService->addFeed([
                    'name' => $name,
                    'url' => $url,
                    'category' => $category,
                    'isActive' => $isActive
                ]);
                
                $this->addFlash('success', 'Le flux RSS a été ajouté avec succès.');
                
                return $this->redirectToRoute('app_veille_feeds');
            } else {
                $this->addFlash('danger', 'Veuillez remplir tous les champs obligatoires.');
            }
        }
        
        $categories = $rssService->getAllCategories();
        
        return $this->render('veille/feed_form.html.twig', [
            'categories' => $categories,
            'feed' => null
        ]);
    }
    
    #[Route('/feeds/{id}/edit', name: 'app_veille_feed_edit')]
    public function editFeed(Request $request, string $id, RssService $rssService): Response
    {
        $feeds = $rssService->getAllFeeds();
        $feed = null;
        
        // Trouver le flux par ID
        foreach ($feeds as $f) {
            if (($f['id'] ?? '') === $id) {
                $feed = $f;
                break;
            }
        }
        
        if (!$feed) {
            $this->addFlash('danger', 'Flux RSS non trouvé.');
            return $this->redirectToRoute('app_veille_feeds');
        }
        
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $url = $request->request->get('url');
            $category = $request->request->get('category');
            $isActive = $request->request->get('is_active') === 'on';
            
            if ($name && $url) {
                $rssService->updateFeed($id, [
                    'name' => $name,
                    'url' => $url,
                    'category' => $category,
                    'isActive' => $isActive
                ]);
                
                $this->addFlash('success', 'Le flux RSS a été modifié avec succès.');
                
                return $this->redirectToRoute('app_veille_feeds');
            } else {
                $this->addFlash('danger', 'Veuillez remplir tous les champs obligatoires.');
            }
        }
        
        $categories = $rssService->getAllCategories();
        
        return $this->render('veille/feed_form.html.twig', [
            'categories' => $categories,
            'feed' => $feed
        ]);
    }
    
    #[Route('/feeds/{id}/delete', name: 'app_veille_feed_delete', methods: ['POST'])]
    public function deleteFeed(Request $request, string $id, RssService $rssService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$id, $request->request->get('_token'))) {
            $rssService->deleteFeed($id);
            $this->addFlash('success', 'Le flux RSS a été supprimé avec succès.');
        }
        
        return $this->redirectToRoute('app_veille_feeds');
    }
    
    #[Route('/feeds/{id}/toggle', name: 'app_veille_feed_toggle')]
    public function toggleFeed(string $id, RssService $rssService): Response
    {
        $feeds = $rssService->getAllFeeds();
        
        foreach ($feeds as $feed) {
            if (($feed['id'] ?? '') === $id) {
                $isActive = !($feed['isActive'] ?? false);
                $rssService->updateFeed($id, ['isActive' => $isActive]);
                
                $status = $isActive ? 'activé' : 'désactivé';
                $this->addFlash('success', 'Le flux RSS a été ' . $status . ' avec succès.');
                break;
            }
        }
        
        return $this->redirectToRoute('app_veille_feeds');
    }
}