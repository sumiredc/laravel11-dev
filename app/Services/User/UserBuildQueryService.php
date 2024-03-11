<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

final class UserBuildQueryService
{
    /**
     * @param  Builder|User $query
     * @param  string       $value
     * @return Builder|User
     */
    public function searchName(Builder $query, string $value): Builder
    {
        if (filled($value)) {
            $query->whereLike('name', $value);
        }

        return $query;
    }

    /**
     * @param  Builder|User $query
     * @param  string       $value
     * @return Builder|User
     */
    public function searchEmail(Builder $query, string $value): Builder
    {
        if (filled($value)) {
            $query->whereLike('email', $value);
        }

        return $query;
    }
}
