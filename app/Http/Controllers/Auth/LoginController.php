<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\LoginData;
use App\Http\Controllers\Controller;
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
    public function login(LoginService $loginService, LoginData $loginData): RedirectResponse
    {
        $isAuthenticate = $loginService->loginUser($loginData);

        if (! $isAuthenticate) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        session()->regenerate();

        return redirect()->intended('home');
    }
}
