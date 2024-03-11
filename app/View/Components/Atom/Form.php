<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use App\Enums\Component\FormMethod;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Form extends Component
{
    public readonly string $original;

    /**
     * @param string $method
     */
    public function __construct(public string $method = 'get')
    {
        $formMethod = FormMethod::from(mb_strtolower($method));
        $this->method = $formMethod->value;
        $this->original = $formMethod->original();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.form');
    }

    /**
     * @return bool
     */
    public function isCsrf(): bool
    {
        return $this->method !== FormMethod::Get->value;
    }
}
