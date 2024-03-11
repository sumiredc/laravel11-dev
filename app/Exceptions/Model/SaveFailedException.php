<?php

declare(strict_types=1);

namespace App\Exceptions\Model;

use Exception;

final class SaveFailedException extends Exception
{
    /** @var int */
    protected $code = 500;

    /**
     * @param string $model
     */
    public function __construct(string $model)
    {
        parent::__construct("Failed to save to {$model}.");
    }
}
