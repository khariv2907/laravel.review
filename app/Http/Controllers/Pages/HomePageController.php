<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use function view;

class HomePageController extends Controller
{
    /**
     * Home page.
     */
    public function __invoke(): Factory|View|Application
    {
        $pageTitle = 'Home';

        return view('pages.home.index', compact('pageTitle'));
    }
}
