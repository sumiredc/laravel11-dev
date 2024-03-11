<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\User\UserBuildQueryService;
use Illuminate\Contracts\Pagination\Paginator;

final class UserIndexUseCase
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserBuildQueryService $userBuildQueryService
    ) {
    }

    public function execute(string $name, string $email): Paginator
    {
        $query = app(User::class)->query();
        $query = $this->userBuildQueryService->searchName($query, $name);
        $query = $this->userBuildQueryService->searchEmail($query, $email);
        $users = $this->userRepository->paginateForQuery($query);

        return $users;
    }
}
