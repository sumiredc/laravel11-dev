<?php

declare(strict_types=1);

namespace App\Exceptions\Request;

use Exception;

final class InvalidatedValueException extends Exception
{
    /** @var int */
    protected $code = 422;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct("[{$name}] is not valid.");
    }
}
