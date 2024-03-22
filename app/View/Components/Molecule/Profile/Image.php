<?php

declare(strict_types=1);

namespace App\View\Components\Molecule\Profile;

use App\Models\Profile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Image extends Component
{
    /**
     * @param Profile|null $profile
     */
    public function __construct(
        public readonly ?Profile $profile
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.molecule.profile.image');
    }
}
