<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\LoginData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showForm(SeoService $seoService): Factory|View|Application
    {
        $pageTitle = $seoService->getTitleByInputString('Sign in');

        return view('web.frontend.auth.login', compact('pageTitle'));
    }

    /**
     * Login a user.
     */
    public function login(LoginService $loginService, LoginRequest $request): RedirectResponse
    {
        /** @var LoginData $loginData */
        $loginData = $request->getData();

        $isAuthenticated = $loginService->loginByDataObject($loginData);

        if (! $isAuthenticated) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ]);
        }

        // Regenerate user's session.
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
