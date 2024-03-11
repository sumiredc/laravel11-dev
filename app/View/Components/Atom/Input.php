<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use App\Enums\Component\InputType;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

final class Input extends Component
{
    public readonly string $dotName;

    /**
     * @param string|null $id
     * @param string      $type
     * @param string      $name
     * @param string|null $value
     */
    public function __construct(
        public ?string $id = null,
        public string $type = 'text',
        public readonly string $name = '',
        public readonly ?string $value = null
    ) {
        $this->id = $id ?? Str::uuid()->toString();
        $this->type = InputType::from($type)->value;
        $this->dotName = name_to_dot($name);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.input');
    }
}
