<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showForm()
    {
        $pageTitle = 'Sign in';
        
        return view('pages.auth.login', compact('pageTitle'));
    }

    /**
     * Login a user.
     */
    public function login()
    {

    }
}
