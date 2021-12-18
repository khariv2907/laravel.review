<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\LoginData;
use App\Dto\Auth\RegisterData;
use App\Enums\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Seo\SeoService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    use HasRedirectWithMessage;

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

        $user = $registerService->registerByDataObject($registerData);

        if (! $user) {
            return $this->backWithError(__('auth.register.failed'));
        }

        event(new Registered($user));

        // Authenticate the user.
        $loginService->loginByUser($user);

        // Regenerate user's session.
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
