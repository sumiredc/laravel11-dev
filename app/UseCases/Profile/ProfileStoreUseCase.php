<?php

namespace App\UseCases\Profile;

use App\Models\Profile;
use App\Models\User;
use App\Repositories\ProfileRepository;

final class ProfileStoreUseCase
{
    /**
     * @param ProfileRepository $profileRepository
     */
    public function __construct(
        private readonly ProfileRepository $profileRepository
    ) {
    }

    /**
     * @param User $user
     * @param ProfileUploadInput $input
     * @return Profile
     */
    public function execute(User $user, ProfileUploadInput $input): Profile
    {
        $profile = $this->profileRepository->create($user, $input);
        return $profile;
    }
}
