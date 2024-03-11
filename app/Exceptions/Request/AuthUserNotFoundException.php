<?php

declare(strict_types=1);

namespace App\Exceptions\Request;

use Exception;

final class AuthUserNotFoundException extends Exception
{
    /** @var int */
    protected $code = 422;

    /** @var string */
    protected $message = 'Authentication user information could not be retrieved.';
}
