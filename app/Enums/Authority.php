<?php

declare(strict_types=1);

namespace App\Enums;

enum Authority: int
{
    case Administrator = 0;
    case Customer = 1;
}
