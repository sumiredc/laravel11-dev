<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\View\Components\Pages\IndexPage;

final class IndexController extends Controller
{
    /**
     * @param  IndexRequest $request
     * @return View
     */
    public function __invoke(IndexRequest $request): string
    {
        $component = app(IndexPage::class);

        return $this->renderComponent($component);
    }
}
