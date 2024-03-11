<?php

declare(strict_types=1);

namespace App\UseCases\SignIn;

use App\Models\User;
use App\Repositories\AuthRepository;

final class SignInStoreUseCase
{
    public function __construct(
        private AuthRepository $authRepository
    ) {
    }

    public function execute(string $email, string $password): ?User
    {
        return $this->authRepository
            ->attempt($email, $password);
    }
}
