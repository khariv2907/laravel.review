<?php

namespace App\Traits;

use App\Enums\Alert;
use Illuminate\Http\RedirectResponse;

trait HasRedirectWithMessage
{
    /**
     * Redirect back with message.
     */
    public function backWithMessage(Alert $alert, string $message): RedirectResponse
    {
        return back()->with([
            'alert' => $alert->value,
            'message' => $message,
        ]);
    }

    /**
     * Redirect back with message.
     */
    public function backWithError(string $message): RedirectResponse
    {
        return $this->backWithMessage(Alert::Danger(), $message);
    }

    /**
     * Redirect back with message.
     */
    public function backWithSuccess(string $message): RedirectResponse
    {
        return $this->backWithMessage(Alert::Success(), $message);
    }

    /**
     * Redirect back with message.
     */
    public function redirectToRouteWithMessage(string $routeName, Alert $alert, string $message): RedirectResponse
    {
        return redirect()->route($routeName)->with([
            'alert' => $alert->value,
            'message' => $message,
        ]);
    }

    /**
     * Redirect back with message.
     */
    public function redirectToRouteWithError(string $routeName, string $message): RedirectResponse
    {
        return $this->redirectToRouteWithMessage($routeName, Alert::Danger(), $message);
    }

    /**
     * Redirect back with message.
     */
    public function redirectToRouteWithSuccess(string $routeName, string $message): RedirectResponse
    {
        return $this->redirectToRouteWithMessage($routeName, Alert::Success(), $message);
    }
}
