<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Exceptions\Request\AuthUserNotFoundException;
use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;
use Illuminate\Support\Facades\Gate;

abstract class FormRequest extends HttpFormRequest
{
    /**
     * @param  string $ability
     * @param  mixed  $arguments Gate::authorize Arguments
     * @return bool
     */
    protected function can(string $ability, mixed $arguments): bool
    {
        $response = Gate::authorize($ability, $arguments);

        return $response->allowed();
    }

    /** @param  string|null  $guard */
    final public function tryUser($guard = null): ?User
    {
        return parent::user($guard);
    }

    /**
     * @param  string|null               $guard
     * @throws AuthUserNotFoundException
     */
    final public function user($guard = null): User
    {
        /** @var User|null $user */
        $user = parent::user($guard);

        if (is_null($user)) {
            throw new AuthUserNotFoundException();
        }

        return $user;
    }
}
