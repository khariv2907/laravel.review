<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowProfileController extends Controller
{
    /**
     * Profile page.
     */
    public function __invoke(SeoService $seoService): Factory|View|Application
    {
        $pageTitle = $seoService->getTitleByInputString(__('seo.profile.title'));
        $user = Auth::user();

        return view('web.frontend.profile.index', compact([
            'pageTitle',
            'user',
        ]));
    }
}
