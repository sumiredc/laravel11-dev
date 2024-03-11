<?php

declare(strict_types=1);

namespace App\Rules\User;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

final class UserEmailRule implements ValidationRule
{
    const EMAIL_COLUMN = 'email';

    /**
     * @param int|null $ignoreUserId
     */
    public function __construct(
        private ?int $ignoreUserId = null
    ) {
    }

    /**
     * @param Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $params = [
            'table' => app(User::class)->getTable(),
            'column' => self::EMAIL_COLUMN,
        ];

        $uniqueRule = app(Unique::class, $params)
            ->when(
                !is_null($this->ignoreUserId),
                fn (Unique $u) => $u->ignore($this->ignoreUserId)
            );

        $validator = Validator::make(
            data: [$attribute => $value],
            rules: [$attribute => [
                'email:strict,dns,spoof,filter',
                'max:200',
                $uniqueRule,
            ]],
        );

        if ($validator->fails()) {
            $fail($validator->messages()->first());
        }
    }
}
