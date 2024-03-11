<?php

declare(strict_types=1);

namespace App\View\Components\Pages\User;

use App\Models\User;
use App\View\WithMessageTrait;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class UserIndexPage extends Component
{
    use WithMessageTrait;

    /**
     * @param Paginator<User> $users
     */
    public function __construct(
        public readonly Paginator $users
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.pages.user.user-index-page');
    }
}
