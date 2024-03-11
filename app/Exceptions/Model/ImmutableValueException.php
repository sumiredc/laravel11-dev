<?php

declare(strict_types=1);

namespace App\Exceptions\Model;

use Exception;

final class ImmutableValueException extends Exception
{
    /** @var int */
    protected $code = 400;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct("[{$name}] cannot be changed.");
    }
}
