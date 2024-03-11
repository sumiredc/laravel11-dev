<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\Model\SaveFailedException;
use App\Models\User;
use App\UseCases\User\UserStoreInput;
use App\UseCases\User\UserUpdateInput;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

final class UserRepository
{
    private const PER_PAGE = 30;

    private const PAGE = 1;

    /**
     * @param  UserStoreInput      $input
     * @param  string              $passwordHash
     * @return User
     * @throws SaveFailedException
     */
    public function store(UserStoreInput $input, string $passwordHash): User
    {
        $attributes = $input->attributes();
        $attributes['password'] = $passwordHash;

        /** @var User $user */
        $user = app(User::class)->fill($attributes);

        if ($user->save()) {
            return $user;
        }

        throw new SaveFailedException(User::class);
    }

    /**
     * @param  User                $user
     * @param  string              $name
     * @param  string              $email
     * @return User
     * @throws SaveFailedException
     */
    public function update(
        User $user,
        UserUpdateInput $input,
    ): User {
        $attributes = $input->attributes();
        $user->fill($attributes);

        if ($user->save()) {
            return $user;
        }

        throw new SaveFailedException(User::class);
    }

    /**
     * @param  User                $user
     * @return User
     * @throws SaveFailedException
     */
    public function delete(User $user): User
    {
        if ($user->delete()) {
            return $user;
        }

        throw new SaveFailedException(User::class);
    }

    /**
     * @param  Builder   $query
     * @param  int|null  $perPage
     * @param  int|null  $page
     * @return Paginator
     */
    public function paginateForQuery(
        Builder $query,
        ?int $perPage = null,
        ?int $page = null
    ): Paginator {
        return $query->paginate(
            perPage: $perPage ?? self::PER_PAGE,
            page: $page ?? self::PAGE
        );
    }
}
