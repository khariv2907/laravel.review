<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\RegisterData;
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
     * Create a new instance.
     */
    public function __construct(
        private SeoService $seoService,
        private LoginService $loginService,
        private RegisterService $registerService,
    ) {
    }

    /**
     * Show the register form.
     */
    public function showForm(): Factory|View|Application
    {
        $pageTitle = $this->seoService->getTitleByInputString(__('seo.register.title'));

        return view('web.frontend.auth.register', compact('pageTitle'));
    }

    /**
     * Register new user.
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        /** @var RegisterData $data */
        $data = $request->getData();

        $user = $this->registerService->registerByDataObject($data);

        if (! $user) {
            return $this->backWithError(__('auth.register.failed'));
        }

        event(new Registered($user));

        // Authenticate the user.
        $this->loginService->loginByUser($user);

        // Regenerate user's session.
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
