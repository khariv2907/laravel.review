<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    private string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title = null)
    {
        $this->title = $this->generateTitle($title);
    }

    /**
     * {@inheritdoc}
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('components.layouts.app', [
            'lang' => $this->getLang(),
            'title' => $this->title,
        ]);
    }

    /**
     * Get lang html attribute.
     */
    protected function getLang(): string
    {
        return str_replace('_', '-', app()->getLocale());
    }

    /**
     * Generate page title.
     */
    protected function generateTitle(?string $title): string
    {
        $appName = config('app.name');
        
        if (! $title) {
            return $appName;
        }
        
        return implode(' ', [$title, '|', $appName]);
    }
}
