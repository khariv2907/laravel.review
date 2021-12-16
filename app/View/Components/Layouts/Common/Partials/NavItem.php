<?php

namespace App\View\Components\Layouts\Common\Partials;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class NavItem extends Component
{
    private string $routeName;
    private string $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $routeName, string $label)
    {
        $this->routeName = $routeName;
        $this->label = $label;
    }

    /**
     * {@inheritdoc}
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('components.layouts.common.partials.nav-item', [
            'link' => $this->getLink(),
            'routeName' => $this->routeName,
            'label' => $this->label,
        ]);
    }

    /**
     * Get link by route name.
     */
    protected function getLink(): string
    {
        return route($this->routeName);
    }

    /**
     * Check if the route is active.
     */
    public function isActive(string $routeName): bool
    {
        return Route::is($routeName);
    }
}
