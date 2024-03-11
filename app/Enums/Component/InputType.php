<?php

declare(strict_types=1);

namespace App\Enums\Component;

enum InputType: string
{
    case Text = 'text';
    case Email = 'email';
    case Number = 'number';
}
