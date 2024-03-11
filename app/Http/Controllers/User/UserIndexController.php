<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserIndexRequest;
use App\UseCases\User\UserIndexUseCase;
use App\View\Components\Pages\User\UserIndexPage;

final class UserIndexController extends Controller
{
    /**
     * @param UserIndexUseCase $userIndexUseCase
     */
    public function __construct(
        private readonly UserIndexUseCase $userIndexUseCase
    ) {
    }

    public function __invoke(UserIndexRequest $request): string
    {
        $name = $request->validatedName();
        $email = $request->validatedEmail();
        $users = $this->userIndexUseCase->execute($name, $email);
        $component = app(UserIndexPage::class, compact('users'));

        return $this->renderComponent($component);
    }
}
