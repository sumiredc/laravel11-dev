<?php

declare(strict_types=1);

namespace App\Services;

use App\Domains\ValueObjects\Password;
use Illuminate\Support\Facades\Hash;
use Random\Randomizer;

final class GeneratePasswordService
{
    const LENGTH = 16;

    const CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+,.<>/?';

    /**
     * @param  string   $plainText
     * @return Password
     */
    public function make(string $plainText = ''): Password
    {
        if ($plainText === '') {
            /** @var Randomizer $randomizer */
            $randomizer = app(Randomizer::class);
            $plainText = $randomizer->getBytesFromString(self::CHARACTERS, self::LENGTH);
        }

        $hash = Hash::make($plainText);

        return app(Password::class, compact('plainText', 'hash'));
    }
}
