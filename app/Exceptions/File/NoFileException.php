<?php

namespace App\Exceptions\File;

use Exception;

final class NoFileException extends Exception
{
    /** @var int */
    protected $code = 500;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        parent::__construct("The uploaded file does not exist. {$path}");
    }
}
