<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

final class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param  User     $auth
     * @return Response
     */
    public function index(User $auth): Response
    {
        return $auth->isAdministrator()
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $auth
     * @return Response
     */
    public function create(User $auth): Response
    {
        return $auth->isAdministrator()
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $auth
     * @return Response
     */
    public function store(User $auth): Response
    {
        return $auth->isAdministrator()
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $auth
     * @param  User     $user
     * @return Response
     */
    public function show(User $auth, User $user): Response
    {
        if ($auth->isAdministrator()) {
            return $this->allow();
        }

        return $auth->id === $user->id
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $auth
     * @param  User     $user
     * @return Response
     */
    public function edit(User $auth, User $user): Response
    {
        if ($auth->isAdministrator()) {
            return $this->allow();
        }

        return $auth->id === $user->id
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $auth
     * @param  User     $user
     * @return Response
     */
    public function update(User $auth, User $user): Response
    {
        if ($auth->isAdministrator()) {
            return $this->allow();
        }

        return $auth->id === $user->id
            ? $this->allow()
            : $this->deny();
    }

    /**
     * @param  User     $auth
     * @param  User     $user
     * @return Response
     */
    public function destroy(User $auth, User $user): Response
    {
        return $auth->isAdministrator() && $auth->id !== $user->id
            ? $this->allow()
            : $this->deny();
    }
}
