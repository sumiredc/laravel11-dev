<?php

declare(strict_types=1);

namespace App\Rules\Profile;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;

final class ProfileFileRule implements ValidationRule
{
    /**
     * @param Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validator = Validator::make(
            data: [$attribute => $value],
            rules: [$attribute => ['file', 'image', 'mimetypes:image/png,image/jpeg', 'max:4096']],
        );

        if ($validator->fails()) {
            $fail($validator->messages()->first());
        }
    }
}
