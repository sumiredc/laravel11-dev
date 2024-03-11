<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class AuthRepository
{
    public function attempt(string $email, string $password): ?User
    {
        if (Auth::attempt(compact('email', 'password'))) {
            return Auth::user();
        }
    }
}
