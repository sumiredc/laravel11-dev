<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

final class Radio extends Component
{
    public readonly string $dotName;

    /**
     * @param string|null $id
     * @param string      $name
     * @param string|null $value
     * @param bool        $disabled
     */
    public function __construct(
        public ?string $id = null,
        public readonly string $name = '',
        public readonly ?string $value = null,
        public readonly bool $disabled = false
    ) {
        $this->id = $id ?? Str::uuid()->toString();
        $this->dotName = name_to_dot($name);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.radio');
    }
}
