<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;

final class EmailRule implements ValidationRule
{
    /**
     * @param Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validator = Validator::make(
            data: [$attribute => $value],
            rules: [$attribute => ['email:strict,dns,spoof,filter', 'max:200']],
        );

        if ($validator->fails()) {
            $fail($validator->messages()->first());
        }
    }
}
