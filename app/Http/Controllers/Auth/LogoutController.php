<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Logout the user.
     */
    public function __invoke(): void
    {
        Auth::logout();
    }

}
