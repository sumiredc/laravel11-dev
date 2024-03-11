<?php

declare(strict_types=1);

namespace App\Casts\User;

use App\Enums\User\UserEmailStatus;
use App\Exceptions\Model\ImmutableValueException;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

final class UserEmailStatusCast implements CastsAttributes
{
    /**
     * @param  Model|User           $model
     * @param  string               $key
     * @param  mixed                $value
     * @param  array<string, mixed> $attributes
     * @return UserEmailStatus
     */
    public function get(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): UserEmailStatus {
        return empty($model->email_verified_at)
            ? UserEmailStatus::Unauthenticated
            : UserEmailStatus::Authenticated;
    }

    /**
     * @param  Model|User              $model
     * @param  string                  $key
     * @param  mixed                   $value
     * @param  array                   $attributes
     * @return UserEmailStatus
     * @throws ImmutableValueException
     */
    public function set(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): UserEmailStatus {
        if (is_a($value, UserEmailStatus::class)) {
            return $value;
        }
        throw new ImmutableValueException($key);
    }
}
