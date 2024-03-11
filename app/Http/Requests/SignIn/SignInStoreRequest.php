<?php

declare(strict_types=1);

namespace App\Http\Requests\SignIn;

use App\Exceptions\Request\InvalidatedValueException;
use App\Http\Requests\FormRequest;
use App\Rules\EmailRule;
use App\Rules\PasswordRule;

final class SignInStoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', app(EmailRule::class)],
            'password' => ['required', app(PasswordRule::class)],
        ];
    }

    /**
     * @return string
     */
    public function validatedEmail(): string
    {
        $value = $this->validated('email', '');

        if (empty($value)) {
            throw new InvalidatedValueException('email');
        }

        return $value;
    }

    /**
     * @return string
     */
    public function validatedPassword(): string
    {
        $value = $this->validated('password', '');

        if (empty($value)) {
            throw new InvalidatedValueException('password');
        }

        return $value;
    }
}
