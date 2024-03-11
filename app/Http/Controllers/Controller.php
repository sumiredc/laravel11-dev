<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

abstract class Controller
{
    /**
     * @param  Component $component
     * @return string
     */
    protected function renderComponent(Component $component): string
    {
        return Blade::renderComponent($component);
    }

    /**
     * @return void
     */
    protected function begin(): void
    {
        DB::beginTransaction();
    }

    /**
     * @return void
     */
    protected function commit(): void
    {
        DB::commit();
    }

    /**
     * @return void
     */
    protected function rollback(): void
    {
        DB::rollBack();
    }
}
