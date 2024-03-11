<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\UseCases\InputInterface;

final class UserUpdateInput implements InputInterface
{
    /**
     * @param string $name
     * @param string $email
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email
    ) {
    }

    /**
     * @return array{name?:string,email?:string}
     */
    public function attributes(): array
    {
        $attrs = [];

        if (filled($this->name)) {
            $attrs['name'] = $this->name;
        }

        if (filled($this->email)) {
            $attrs['email'] = $this->email;
        }

        return $attrs;
    }
}
