<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Home page.
     */
    public function index(): View
    {
        return view('home');
    }
}
