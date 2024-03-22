<?php

declare(strict_types=1);

use App\Http\Actions\Profile\ProfileUploadAction;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('profile')->name('profile.')->group(
    static function () {
        Route::name('upload')->post('upload/{user}', ProfileUploadAction::class)->whereNumber('user');
    }
);
