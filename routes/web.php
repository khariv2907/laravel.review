<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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
], function() {
    // Login.
    Route::middleware(['guest'])
        ->prefix('login')
        ->as('login')
        ->group(static function() {
            Route::get('/', [LoginController::class, 'showForm']);
            Route::post('/', [LoginController::class, 'login']);
    });

    // Register.
    Route::middleware(['guest'])
        ->prefix('register')
        ->as('register')
        ->group(static function() {
            Route::get('/', [RegisterController::class, 'showForm']);
            Route::post('/', [RegisterController::class, 'register']);
        });
    
    // Logout.
    Route::get('/logout', LogoutController::class)
        ->middleware('auth')
        ->name('logout');
});