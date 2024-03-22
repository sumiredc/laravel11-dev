<?php

namespace App\Repositories;

use App\Exceptions\Model\SaveFailedException;
use App\Models\Profile;
use App\Models\User;
use App\UseCases\Profile\ProfileUploadInput;

final class ProfileRepository
{
    /**
     * @param User $user
     * @param ProfileUploadInput $input
     * @return Profile
     */
    public function create(User $user, ProfileUploadInput $input): Profile
    {
        $attributes = $input->attributes();

        return $user->profile()
            ->create($attributes);
    }

    /**
     * @param Profile $profile
     * @param ProfileUploadInput $input
     * @return Profile
     */
    public function update(Profile $profile, ProfileUploadInput $input): Profile
    {
        $attributes = $input->attributes();

        $profile->fill($attributes);

        if ($profile->save()) {
            return $profile;
        }

        throw new SaveFailedException(Profile::class);
    }
}
