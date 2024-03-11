<?php

declare(strict_types=1);

namespace App\View\Components\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class IndexPage extends Component
{
    public function __construct()
    {
    }

    /**
     * @return View
     */
    public function render(): View|Closure|string
    {
        return view('components.pages.index-page');
    }
}
