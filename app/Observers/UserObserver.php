<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

final class UserObserver
{
    /**
     * @param  User $user
     * @return void
     */
    public function creating(User $user): void
    {
        $user->uuid ??= Str::uuid()->toString();
    }

    /**
     * @param  User $user
     * @return void
     */
    public function saving(User $user): void
    {
        $user->uuid ??= Str::uuid()->toString();
    }
}
