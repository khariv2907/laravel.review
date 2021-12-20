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
     * Create a new instance.
     */
    public function __construct(
        private SeoService $seoService,
    ) {}

    /**
     * Profile page.
     */
    public function __invoke(): Factory|View|Application
    {
        $pageTitle = $this->seoService->getTitleByInputString(__('seo.account.profile.title'));
        $user = Auth::user();

        return view('web.frontend.account.profile.index', compact([
            'pageTitle',
            'user',
        ]));
    }
}
