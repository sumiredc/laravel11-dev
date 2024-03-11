<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Models\User;
use App\Repositories\UserRepository;

final class UserUpdateUseCase
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    /**
     * @param  User            $user
     * @param  UserUpdateInput $input
     * @return void
     */
    public function execute(User $user, UserUpdateInput $input): void
    {
        if (empty($input->attributes())) {
            return;
        }
        $this->userRepository->update($user, $input);
    }
}
