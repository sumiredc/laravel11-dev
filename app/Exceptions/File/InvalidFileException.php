<?php

namespace App\Exceptions\File;

use Exception;

final class InvalidFileException extends Exception
{
    /** @var int */
    protected $code = 500;

    /**
     * @param string $expected
     * @param string $actual
     */
    public function __construct(string $expected, string $actual)
    {
        parent::__construct(
            "The uploaded file path does not match the expected path. expected: {$expected}, actual: {$actual}",
        );
    }
}
