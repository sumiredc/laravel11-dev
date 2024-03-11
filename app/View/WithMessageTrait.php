<?php

declare(strict_types=1);

namespace App\View;

use Illuminate\Support\Facades\Session;

trait WithMessageTrait
{
    /**
     * @return bool
     */
    public function hasSuccessMessage(): bool
    {
        return Session::has('success');
    }

    /**
     * @return string
     */
    public function successMessage(): string
    {
        return Session::get('success', '');
    }
}
