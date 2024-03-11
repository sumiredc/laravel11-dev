<?php

declare(strict_types=1);

namespace App\Enums\Component;

enum FormMethod: string
{
    case Get = 'get';
    case Post = 'post';
    case Put = 'put';
    case Patch = 'patch';
    case Delete = 'delete';

    public function original(): string
    {
        return match ($this) {
            self::Get => 'GET',
            default => 'POST',
        };
    }
}
