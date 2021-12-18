<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\LoginData;
use App\Dto\Auth\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
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
    public function register(
        RegisterService $registerService, 
        LoginService $loginService, 
        RegisterRequest $request
    ): RedirectResponse
    {
        /** @var RegisterData $registerData */
        $registerData = $request->getData();

        $user = $registerService->registerFromDataObject($registerData);
        
        if (! $user) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $loginService->loginByUser($user);
        
        // Regenerate user's session.
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
