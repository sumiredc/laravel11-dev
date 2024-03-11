<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\View\Components\Pages\User\UserCreatePage;

final class UserCreateController extends Controller
{
    /**
     * @param  UserCreateRequest $request
     * @return string
     */
    public function __invoke(UserCreateRequest $request): string
    {
        $component = app(UserCreatePage::class);

        return $this->renderComponent($component);
    }
}
