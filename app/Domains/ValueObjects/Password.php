<?php

declare(strict_types=1);

namespace App\Domains\ValueObjects;

final class Password
{
    /**
     * @param string $plainText
     * @param string $hash
     */
    public function __construct(
        public readonly string $plainText,
        public readonly string $hash
    ) {
    }
}
