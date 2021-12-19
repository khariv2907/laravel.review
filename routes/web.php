<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Profile\ShowProfileController;
use App\Http\Controllers\Profile\UpdatePasswordController;
use App\Http\Controllers\Profile\UpdateProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Pages.
 */
Route::get('/', HomePageController::class)->name('home');

/**
 * Auth.
 */
Route::as('auth.')
    ->group(static function() {
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

/**
 * Profile.
 */
Route::prefix('profile')
    ->as('profile.')
    ->middleware('auth')
    ->group(static function() {
        Route::get('/', ShowProfileController::class)->name('index');
        Route::post('/update', UpdateProfileController::class)->name('update');
        Route::post('/update/password', UpdatePasswordController::class)->name('update.password');
    });