<?php

use App\Http\Controllers\Account\Articles\ArticleResourceController;
use App\Http\Controllers\Account\Profile\ShowProfileController;
use App\Http\Controllers\Account\Profile\UpdatePasswordController;
use App\Http\Controllers\Account\Profile\UpdateProfileController;
use App\Http\Controllers\Articles\ArticleListController;
use App\Http\Controllers\Articles\ShowArticleController;
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
 * Account.
 */
Route::prefix('account')
    ->as('account.')
    ->middleware('auth')
    ->group(static function() {
        // Profile.
        Route::prefix('profile')
            ->as('profile.')
            ->group(static function() {
                Route::get('/', ShowProfileController::class)->name('index');
                Route::post('/update', UpdateProfileController::class)->name('update');
                Route::post('/update/password', UpdatePasswordController::class)->name('update.password');
            });

        // Articles.
        Route::resource('articles', ArticleResourceController::class);
    });

/**
 * Articles.
 */
Route::prefix('articles')
    ->as('articles.')
    ->group(static function() {
        Route::get('/', ArticleListController::class)->name('index');
        Route::get('/{id}', ShowArticleController::class)->name('show');
    });