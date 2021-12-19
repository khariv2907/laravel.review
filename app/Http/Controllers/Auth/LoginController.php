<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\LoginData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use App\Services\Seo\SeoService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    use HasRedirectWithMessage;
    
    /**
     * Show the login form.
     */
    public function showForm(SeoService $seoService): Factory|View|Application
    {
        $pageTitle = $seoService->getTitleByInputString(__('seo.login.title'));

        return view('web.frontend.auth.login', compact('pageTitle'));
    }

    /**
     * Login a user.
     */
    public function login(LoginService $loginService, LoginRequest $request): RedirectResponse
    {
        /** @var LoginData $data */
        $data = $request->getData();

        $isAuthenticated = $loginService->loginByDataObject($data);

        if (! $isAuthenticated) {
            return $this->backWithError(__('auth.login.failed'));
        }

        // Regenerate user's session.
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
