<?php

declare(strict_types=1);

use App\Http\Controllers\User\UserCreateController;
use App\Http\Controllers\User\UserDestroyController;
use App\Http\Controllers\User\UserEditController;
use App\Http\Controllers\User\UserIndexController;
use App\Http\Controllers\User\UserShowController;
use App\Http\Controllers\User\UserStoreController;
use App\Http\Controllers\User\UserUpdateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('user')->name('user.')->group(
    static function () {
        Route::name('index')->get('', UserIndexController::class);
        Route::name('create')->get('create', UserCreateController::class);
        Route::name('store')->post('', UserStoreController::class);
        Route::name('show')->get('{user}', UserShowController::class)->whereNumber('user');
        Route::name('edit')->get('{user}/edit', UserEditController::class)->whereNumber('user');
        Route::name('update')->put('{user}', UserUpdateController::class)->whereNumber('user');
        Route::name('destroy')->delete('{user}', UserDestroyController::class)->whereNumber('user');
    }
);
