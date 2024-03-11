<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserShowRequest;
use App\Models\User;
use App\View\Components\Pages\User\UserShowPage;
use Illuminate\Contracts\View\View;

final class UserShowController extends Controller
{
    /**
     * @param  UserShowRequest $request
     * @param  User            $user
     * @return View
     */
    public function __invoke(UserShowRequest $request, User $user): string
    {
        $component = app(UserShowPage::class, compact('user'));

        return $this->renderComponent($component);
    }
}
