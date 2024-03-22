<?php

declare(strict_types=1);

namespace App\UseCases\User;

use App\Enums\Authority;
use App\UseCases\InputInterface;

readonly final class UserStoreInput implements InputInterface
{
    /**
     * @param Authority $authority
     * @param string    $name
     * @param string    $email
     */
    public function __construct(
        public readonly Authority $authority,
        public readonly string $name,
        public readonly string $email
    ) {
    }

    /**
     * @return array{authority:Authority,name?:string,email?:string}
     */
    public function attributes(): array
    {
        $attrs = [
            'authority' => $this->authority,
        ];

        if (filled($this->name)) {
            $attrs['name'] = $this->name;
        }

        if (filled($this->email)) {
            $attrs['email'] = $this->email;
        }

        return $attrs;
    }
}
