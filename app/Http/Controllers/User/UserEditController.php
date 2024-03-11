<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserEditRequest;
use App\Models\User;
use App\View\Components\Pages\User\UserEditPage;

final class UserEditController extends Controller
{
    /**
     * @param  UserEditRequest $request
     * @param  User            $user
     * @return string
     */
    public function __invoke(UserEditRequest $request, User $user): string
    {
        $component = app(UserEditPage::class, compact('user'));

        return $this->renderComponent($component);
    }
}
