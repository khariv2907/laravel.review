<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Pages\HomePageController;
use Illuminate\Support\Facades\Route;

/**
 * Pages.
 */
Route::get('/', HomePageController::class)->name('home');

/**
 * Auth.
 */
Route::group([
    'as' => 'auth.',
    'prefix' => 'auth'
], function() {
    // Login.
    Route::middleware(['guest'])
        ->prefix('login')
        ->as('login')
        ->group(static function() {
            Route::get('/', [LoginController::class, 'showForm']);
            Route::post('/', [LoginController::class, 'login']);
    });
    
    // Logout.
    Route::get('/logout', LogoutController::class)
        ->middleware('auth')
        ->name('logout');
});