<?php

declare(strict_types=1);

namespace App\Enums\User;

enum UserEmailStatus: string
{
    case Unauthenticated = 'Unauthenticated';
    case Authenticated = 'Authenticated';
}
