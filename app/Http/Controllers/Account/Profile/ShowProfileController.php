<?php

namespace App\Http\Controllers\Account\Profile;

use App\Http\Controllers\Controller;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ShowProfileController extends Controller
{
    /**
     * Profile page.
     */
    public function __invoke(SeoService $seoService): Factory|View|Application
    {
        $pageTitle = $seoService->getTitleByInputString(__('seo.account.profile.title'));
        $user = Auth::user();

        return view('web.frontend.profile.index', compact([
            'pageTitle',
            'user',
        ]));
    }
}
