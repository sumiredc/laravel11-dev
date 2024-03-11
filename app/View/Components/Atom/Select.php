<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

final class Select extends Component
{
    public readonly string $dotName;

    /** @var array<[value,label,disabled]> */
    public readonly array $items;

    /**
     * @param string|null $id
     * @param string      $name
     * @param string|null $value
     * @param Collection|array<[value,label,disabled]> $items
     * @param bool $unselected
     */
    public function __construct(
        public ?string $id = null,
        public readonly string $name = '',
        public readonly ?string $value = null,
        Collection|array $items = [],
        public readonly bool $unselected = false,
    ) {
        $this->id = $id ?? Str::uuid()->toString();
        $this->dotName = name_to_dot($name);
        $this->makeItems($items);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.select');
    }

    /**
     * @param  Collection|array $items
     * @return void
     */
    private function makeItems(Collection|array $items): void
    {
        $this->items = is_object($items)
            ? $items->toArray()
            : $items;
    }
}
