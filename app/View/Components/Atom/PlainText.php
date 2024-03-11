<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class PlainText extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.plain-text');
    }
}
