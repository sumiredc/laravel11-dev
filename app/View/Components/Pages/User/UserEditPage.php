<?php

declare(strict_types=1);

namespace App\View\Components\Pages\User;

use App\Models\User;
use App\View\WithMessageTrait;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class UserEditPage extends Component
{
    use WithMessageTrait;

    /**
     * @param User $user
     */
    public function __construct(
        public readonly User $user
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.pages.user.user-edit-page');
    }
}
