<?php

namespace App\Providers;

use App\View\Composers\AppLayoutComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // App layout.
        View::composer('web.frontend.layouts.app.index', AppLayoutComposer::class);
    }
}
