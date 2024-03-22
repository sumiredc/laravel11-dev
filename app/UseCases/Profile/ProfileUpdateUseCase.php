<?php

namespace App\UseCases\Profile;

use App\Models\Profile;
use App\Repositories\ProfileRepository;

final class ProfileUpdateUseCase
{

    public function __construct(
        private readonly ProfileRepository $profileRepository
    ) {
    }

    /**
     * @param Profile $profile
     * @param ProfileUploadInput $input
     * @return Profile
     */
    public function execute(Profile $profile, ProfileUploadInput $input): Profile
    {
        $this->profileRepository->update($profile, $input);
        return $profile;
    }
}
