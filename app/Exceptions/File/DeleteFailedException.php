<?php

namespace App\Exceptions\File;

use Exception;

final class DeleteFailedException extends Exception
{
    /** @var int */
    protected $code = 500;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        parent::__construct("Failed to delete the file. {$path}");
    }
}
