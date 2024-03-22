<?php

declare(strict_types=1);

use App\Http\Controllers\Profile\ProfileShowController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('profile')->name('profile.')->group(
    static function () {
        Route::name('show')->get('{profile}', ProfileShowController::class)->whereNumber('profile');
    }
);
