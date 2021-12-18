<?php

namespace App\Services\Seo;

class SeoService
{
    /**
     * Get title by input string.
     */
    public function getTitleByInputString(string $title): string
    {
        return $this->generateTitle($title);
    }

    /**
     * Generate page title.
     */
    private function generateTitle(?string $title): string
    {
        $appName = config('app.name');

        if (! $title) {
            return $appName;
        }

        return implode(' ', [$title, '|', $appName]);
    }
}
