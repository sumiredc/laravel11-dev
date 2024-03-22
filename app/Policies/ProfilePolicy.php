<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

final class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $auth
     * @param User $user
     * @return Response
     */
    public function upload(User $auth, User $user): Response
    {
        return $auth->id === $user->id
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $user
     * @param  Profile $profile
     * @return Response
     */
    public function show(User $user, Profile $profile): Response
    {
        if ($user->isAdministrator()) {
            return $this->allow();
        }

        return $user->id === $profile->user_id
            ? $this->allow()
            : $this->deny();
    }
}
