<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use App\Enums\Component\ButtonType;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

final class Button extends Component
{
    public readonly string $iconEl;

    /**
     * @param string $type
     * @param string $href
     * @param string $icon
     */
    public function __construct(
        public string $type = 'button',
        public readonly string $href = '',
        private readonly string $icon = ''
    ) {
        $this->type = ButtonType::from($this->type)->value;
        $this->makeIconEl($icon);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.button');
    }

    /**
     * @return bool
     */
    public function isLink(): bool
    {
        return filled($this->href);
    }

    /**
     * @param  string $type
     * @return void
     */
    private function makeIconEl(string $type): void
    {
        $this->iconEl = ($type !== '')
            ? Blade::renderComponent(app(Icon::class, compact('type')))
            : '';
    }
}
