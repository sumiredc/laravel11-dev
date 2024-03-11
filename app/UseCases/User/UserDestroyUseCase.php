<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Models\User;
use App\Repositories\UserRepository;

final class UserDestroyUseCase
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    /**
     * @param  User $user
     * @return void
     */
    public function execute(User $user)
    {
        $this->userRepository->delete($user);
    }
}
