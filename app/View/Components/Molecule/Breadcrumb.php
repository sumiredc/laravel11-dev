<?php

declare(strict_types=1);

namespace App\View\Components\Molecule;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Breadcrumb extends Component
{
    /**
     * @param array<{label:string,?href:string}> $items
     */
    public function __construct(
        public readonly array $items = []
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.molecule.breadcrumb');
    }
}
