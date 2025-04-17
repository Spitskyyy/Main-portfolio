<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpClient\HttpClient;

class RssService
{
    private $cacheDir;
    private $configFile;
    private $projectDir;
    
    public function __construct(ParameterBagInterface $params)
    {
        $this->projectDir = $params->get('kernel.project_dir');
        $this->cacheDir = $this->projectDir . '/var/cache/rss';
        $this->configFile = $this->projectDir . '/config/rss_feeds.json';
        
        // Créer le répertoire de cache s'il n'existe pas
        if (!file_exists($this->cacheDir)) {
            $filesystem = new Filesystem();
            $filesystem->mkdir($this->cacheDir, 0777);
        }
        
        // Créer le fichier de configuration s'il n'existe pas
        if (!file_exists($this->configFile)) {
            $this->saveFeeds([
                'feeds' => [],
                'categories' => [
                    ['name' => 'Développement Web', 'icon' => 'fa-code', 'color' => 'primary'],
                    ['name' => 'Intelligence Artificielle', 'icon' => 'fa-robot', 'color' => 'success'],
                    ['name' => 'Cybersécurité', 'icon' => 'fa-shield-alt', 'color' => 'danger'],
                    ['name' => 'DevOps & Cloud', 'icon' => 'fa-server', 'color' => 'info'],
                    ['name' => 'Mobile & Apps', 'icon' => 'fa-mobile-alt', 'color' => 'warning']
                ]
            ]);
        }
    }
    
    /**
     * Récupère tous les flux RSS
     */
    public function getAllFeeds(): array
    {
        $data = $this->loadFeeds();
        return $data['feeds'] ?? [];
    }
    
    /**
     * Récupère toutes les catégories
     */
    public function getAllCategories(): array
    {
        $data = $this->loadFeeds();
        return $data['categories'] ?? [];
    }
    
    /**
     * Récupère les flux RSS actifs
     */
    public function getActiveFeeds(): array
    {
        $feeds = $this->getAllFeeds();
        return array_filter($feeds, function($feed) {
            return $feed['isActive'] ?? false;
        });
    }
    
    /**
     * Récupère les flux RSS par catégorie
     */
    public function getFeedsByCategory(): array
    {
        $feeds = $this->getActiveFeeds();
        $feedsByCategory = [];
        
        foreach ($feeds as $feed) {
            $category = $feed['category'] ?? 'Autre';
            if (!isset($feedsByCategory[$category])) {
                $feedsByCategory[$category] = [];
            }
            $feedsByCategory[$category][] = $feed;
        }
        
        return $feedsByCategory;
    }
    
    /**
     * Ajoute un nouveau flux RSS
     */
    public function addFeed(array $feedData): void
    {
        $data = $this->loadFeeds();
        $feeds = $data['feeds'] ?? [];
        
        // Générer un ID unique
        $feedData['id'] = uniqid();
        $feedData['isActive'] = $feedData['isActive'] ?? true;
        
        $feeds[] = $feedData;
        $data['feeds'] = $feeds;
        
        $this->saveFeeds($data);
    }
    
    /**
     * Met à jour un flux RSS
     */
    public function updateFeed(string $id, array $feedData): bool
    {
        $data = $this->loadFeeds();
        $feeds = $data['feeds'] ?? [];
        
        foreach ($feeds as $key => $feed) {
            if (($feed['id'] ?? '') === $id) {
                $feeds[$key] = array_merge($feed, $feedData);
                $data['feeds'] = $feeds;
                $this->saveFeeds($data);
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Supprime un flux RSS
     */
    public function deleteFeed(string $id): bool
    {
        $data = $this->loadFeeds();
        $feeds = $data['feeds'] ?? [];
        
        foreach ($feeds as $key => $feed) {
            if (($feed['id'] ?? '') === $id) {
                unset($feeds[$key]);
                $data['feeds'] = array_values($feeds); // Réindexer le tableau
                $this->saveFeeds($data);
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Charge les données du fichier de configuration
     */
    private function loadFeeds(): array
    {
        if (!file_exists($this->configFile)) {
            return ['feeds' => [], 'categories' => []];
        }
        
        $content = file_get_contents($this->configFile);
        return json_decode($content, true) ?: ['feeds' => [], 'categories' => []];
    }
    
    /**
     * Sauvegarde les données dans le fichier de configuration
     */
    private function saveFeeds(array $data): void
    {
        file_put_contents($this->configFile, json_encode($data, JSON_PRETTY_PRINT));
    }
    
    /**
     * Récupère les articles d'un flux RSS
     */
    public function getFeedItems(string $feedUrl, int $maxItems = 5): array
    {
        // Vérifier si SimplePie est disponible
        if (!class_exists('SimplePie') && !class_exists('SimplePie\SimplePie')) {
            // Utiliser une méthode alternative si SimplePie n'est pas disponible
            return $this->getFeedItemsAlternative($feedUrl, $maxItems);
        }
        
        try {
            // Déterminer la classe SimplePie à utiliser
            $simplePieClass = class_exists('SimplePie\SimplePie') ? 'SimplePie\SimplePie' : 'SimplePie';
            $feed = new $simplePieClass();
            
            $feed->set_feed_url($feedUrl);
            $feed->set_cache_location($this->cacheDir);
            $feed->enable_cache(true);
            $feed->set_cache_duration(3600); // Cache pendant 1 heure
            $feed->init();
            
            // Vérifier si le flux a été correctement initialisé
            if ($feed->error()) {
                throw new \Exception("Erreur SimplePie: " . $feed->error());
            }
            
            $items = [];
            $count = 0;
            
            foreach ($feed->get_items() as $item) {
                if ($count >= $maxItems) {
                    break;
                }
                
                // Récupérer l'image de l'article si disponible
                $enclosure = $item->get_enclosure();
                $imageUrl = null;
                
                if ($enclosure && $enclosure->get_link() && in_array($enclosure->get_type(), ['image/jpeg', 'image/png', 'image/gif'])) {
                    $imageUrl = $enclosure->get_link();
                } else {
                    // Essayer de trouver une image dans le contenu
                    $content = $item->get_content();
                    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $matches);
                    
                    if (isset($matches['src'])) {
                        $imageUrl = $matches['src'];
                    }
                }
                
                $items[] = [
                    'title' => $item->get_title(),
                    'link' => $item->get_permalink(),
                    'date' => $item->get_date('j F Y'),
                    'author' => $item->get_author() ? $item->get_author()->get_name() : 'Inconnu',
                    'description' => $this->truncateHtml($item->get_description(), 150),
                    'content' => $item->get_content(),
                    'image' => $imageUrl,
                    'source' => $feed->get_title(),
                    'sourceUrl' => $feed->get_permalink(),
                ];
                
                $count++;
            }
            
            return $items;
        } catch (\Exception $e) {
            // En cas d'erreur avec SimplePie, utiliser la méthode alternative
            return $this->getFeedItemsAlternative($feedUrl, $maxItems);
        }
    }
    
    /**
     * Méthode alternative pour récupérer les articles d'un flux RSS sans SimplePie
     */
    private function getFeedItemsAlternative(string $feedUrl, int $maxItems = 5): array
    {
        try {
            // Utiliser HttpClient pour récupérer le contenu du flux
            $client = HttpClient::create();
            $response = $client->request('GET', $feedUrl, [
                'timeout' => 10,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (compatible; RSS Reader/1.0)',
                ],
            ]);
            
            $content = $response->getContent();
            
            // Analyser le XML
            $xml = simplexml_load_string($content);
            
            if (!$xml) {
                throw new \Exception("Impossible de parser le XML du flux RSS");
            }
            
            $items = [];
            $count = 0;
            
            // Déterminer le type de flux (RSS ou Atom)
            $isAtom = $xml->getName() === 'feed';
            
            if ($isAtom) {
                // Traitement pour Atom
                $feedTitle = (string)$xml->title;
                $feedLink = '';
                
                foreach ($xml->link as $link) {
                    if ((string)$link['rel'] === 'alternate' || !isset($link['rel'])) {
                        $feedLink = (string)$link['href'];
                        break;
                    }
                }
                
                foreach ($xml->entry as $entry) {
                    if ($count >= $maxItems) {
                        break;
                    }
                    
                    $title = (string)$entry->title;
                    $link = '';
                    
                    foreach ($entry->link as $entryLink) {
                        if ((string)$entryLink['rel'] === 'alternate' || !isset($entryLink['rel'])) {
                            $link = (string)$entryLink['href'];
                            break;
                        }
                    }
                    
                    $pubDate = isset($entry->published) ? (string)$entry->published : (string)$entry->updated;
                    $pubDate = date('j F Y', strtotime($pubDate));
                    
                    $author = isset($entry->author->name) ? (string)$entry->author->name : 'Inconnu';
                    $description = isset($entry->summary) ? (string)$entry->summary : (string)$entry->content;
                    
                    // Chercher une image
                    $imageUrl = null;
                    $content = isset($entry->content) ? (string)$entry->content : $description;
                    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $matches);
                    
                    if (isset($matches['src'])) {
                        $imageUrl = $matches['src'];
                    }
                    
                    $items[] = [
                        'title' => $title,
                        'link' => $link,
                        'date' => $pubDate,
                        'author' => $author,
                        'description' => $this->truncateHtml($description, 150),
                        'content' => $content,
                        'image' => $imageUrl,
                        'source' => $feedTitle,
                        'sourceUrl' => $feedLink,
                    ];
                    
                    $count++;
                }
            } else {
                // Traitement pour RSS
                $channel = $xml->channel;
                $feedTitle = (string)$channel->title;
                $feedLink = (string)$channel->link;
                
                foreach ($channel->item as $item) {
                    if ($count >= $maxItems) {
                        break;
                    }
                    
                    $title = (string)$item->title;
                    $link = (string)$item->link;
                    $pubDate = isset($item->pubDate) ? (string)$item->pubDate : '';
                    $pubDate = $pubDate ? date('j F Y', strtotime($pubDate)) : date('j F Y');
                    
                    // Correction de la ligne problématique
                    $author = 'Inconnu';
                    if (isset($item->author)) {
                        $author = (string)$item->author;
                    } elseif (isset($item->children('dc', true)->creator)) {
                        $author = (string)$item->children('dc', true)->creator;
                    }
                    
                    $description = isset($item->description) ? (string)$item->description : '';
                    
                    // Chercher une image
                    $imageUrl = null;
                    
                    // Vérifier s'il y a une enclosure (pièce jointe) qui pourrait être une image
                    if (isset($item->enclosure) && isset($item->enclosure['type']) && 
                        in_array((string)$item->enclosure['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
                        $imageUrl = (string)$item->enclosure['url'];
                    } else {
                        // Chercher une image dans la description
                        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $description, $matches);
                        
                        if (isset($matches['src'])) {
                            $imageUrl = $matches['src'];
                        }
                    }
                    
                    $items[] = [
                        'title' => $title,
                        'link' => $link,
                        'date' => $pubDate,
                        'author' => $author,
                        'description' => $this->truncateHtml($description, 150),
                        'content' => $description,
                        'image' => $imageUrl,
                        'source' => $feedTitle,
                        'sourceUrl' => $feedLink,
                    ];
                    
                    $count++;
                }
            }
            
            return $items;
        } catch (\Exception $e) {
            // En cas d'erreur, retourner un tableau vide
            return [];
        }
    }
    
    /**
     * Récupère les articles de plusieurs flux RSS
     */
    public function getMultipleFeedItems(array $feedUrls, int $maxItemsPerFeed = 3, int $totalMaxItems = 15): array
    {
        $allItems = [];
        
        foreach ($feedUrls as $feedUrl) {
            try {
                $items = $this->getFeedItems($feedUrl, $maxItemsPerFeed);
                $allItems = array_merge($allItems, $items);
            } catch (\Exception $e) {
                // Ignorer les flux qui ne peuvent pas être récupérés
                continue;
            }
        }
        
        // Trier par date (du plus récent au plus ancien)
        usort($allItems, function($a, $b) {
            return strtotime($b['date'] ?? '') - strtotime($a['date'] ?? '');
        });
        
        // Limiter le nombre total d'articles
        return array_slice($allItems, 0, $totalMaxItems);
    }
    
    /**
     * Tronque le HTML en préservant les balises
     */
    private function truncateHtml(string $html, int $length = 100): string
    {
        // Supprimer les balises HTML
        $text = strip_tags($html);
        
        // Tronquer le texte
        if (strlen($text) > $length) {
            $text = substr($text, 0, $length) . '...';
        }
        
        return $text;
    }
}