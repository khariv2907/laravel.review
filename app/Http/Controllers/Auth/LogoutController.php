<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Logout the user.
     */
    public function __invoke(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('home');
    }

}
