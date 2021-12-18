<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\LoginData;
use App\Dto\Auth\RegisterData;
use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Seo\SeoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Show the register form.
     */
    public function showForm(SeoService $seoService): Factory|View|Application
    {
        $pageTitle = $seoService->getTitleByInputString('Sign up');

        return view('web.frontend.auth.register', compact('pageTitle'));
    }

    /**
     * Register new user.
     */
    public function register(RegisterService $registerService, RegisterData $registerData): RedirectResponse
    {
        dd($registerData->all());
    }
}
