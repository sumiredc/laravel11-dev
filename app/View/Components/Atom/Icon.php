<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Icon extends Component
{
    /**
     * @param string $type
     */
    public function __construct(
        public readonly string $type
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.icon');
    }
}
