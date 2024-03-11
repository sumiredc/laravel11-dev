<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use App\Repositories\UserRepository;
use App\Services\GeneratePasswordService;

final class UserStoreUseCase
{
    /**
     * @param GeneratePasswordService $generatePasswordService
     * @param UserRepository          $userRepository
     */
    public function __construct(
        private readonly GeneratePasswordService $generatePasswordService,
        private readonly UserRepository $userRepository,
    ) {
    }

    /**
     * @param  UserStoreInput $input
     * @return User
     */
    public function execute(UserStoreInput $input): User
    {
        $password = $this->generatePasswordService
            ->make();

        $user = $this->userRepository
            ->store($input, $password->hash);

        $notification = app(EmailVerificationNotification::class, ['password' => $password->plainText]);

        $user->notify($notification);

        return $user;
    }
}
