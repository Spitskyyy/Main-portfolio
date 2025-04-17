<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('slug', [$this, 'slugify']),
        ];
    }

    public function slugify(string $string): string
    {
        // Remplacer les caractères non alphanumériques par des tirets
        $string = preg_replace('/[^a-z0-9]+/i', '-', $string);
        // Convertir en minuscules
        $string = strtolower($string);
        // Supprimer les tirets en début et fin de chaîne
        $string = trim($string, '-');
        
        return $string;
    }
}