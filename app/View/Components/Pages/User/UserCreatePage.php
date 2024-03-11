<?php

declare(strict_types=1);

namespace App\View\Components\Pages\User;

use App\Enums\Authority;
use App\View\EnumToItemsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class UserCreatePage extends Component
{
    use EnumToItemsTrait;

    /** @var array<{label:string,value:int}> */
    public readonly array $authorities;

    public function __construct()
    {
        $this->authorities = $this->convertEnumToItems(Authority::class);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.pages.user.user-create-page');
    }
}
