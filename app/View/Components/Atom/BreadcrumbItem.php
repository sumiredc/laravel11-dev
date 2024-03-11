<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class BreadcrumbItem extends Component
{
    /**
     * @param string $href
     */
    public function __construct(
        public readonly string $href = '',
        public readonly bool $current = false,
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.breadcrumb-item');
    }
}
