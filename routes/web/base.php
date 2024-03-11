<?php

declare(strict_types=1);

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->name('index')->get('/', IndexController::class);
