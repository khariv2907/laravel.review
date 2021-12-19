<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use function view;

class HomePageController extends Controller
{
    /**
     * Home page.
     */
    public function __invoke(SeoService $seoService): Factory|View|Application
    {
        $pageTitle = $seoService->getTitleByInputString(__('seo.home.title'));
        $user = Auth::user();

        return view('web.frontend.pages.home.index', compact([
            'pageTitle',
            'user',
        ]));
    }
}
