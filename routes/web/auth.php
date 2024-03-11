<?php

declare(strict_types=1);

use App\Http\Controllers\SingIn\SignInStoreController;
use Illuminate\Support\Facades\Route;

Route::name('login')->get('login', static fn () => redirect(route('index')));

Route::middleware('guest')
    ->prefix('sign-in')
    ->name('sign-in.')
    ->group(static function () {
        Route::name('store')->post('', SignInStoreController::class);
    });
