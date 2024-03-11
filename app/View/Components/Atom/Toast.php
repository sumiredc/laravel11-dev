<?php

declare(strict_types=1);

namespace App\View\Components\Atom;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Toast extends Component
{
    public readonly string $status;

    public readonly string $message;

    /**
     * @param array{0:string<status>,1:string<message>} $toast
     */
    public function __construct(array $toast)
    {
        [$this->status, $this->message] = $toast;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.atom.toast');
    }
}
