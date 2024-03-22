<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Exceptions\Request\InvalidatedValueException;
use App\Http\Requests\FormRequest;
use App\Rules\User\UserEmailRule;
use App\Rules\User\UserNameRule;

final class UserUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->can('update', $this->route('user'));
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', app(UserNameRule::class)],
            'email' => ['required', app(UserEmailRule::class)],
        ];
    }

    /**
     * @return string
     */
    public function validatedName(): string
    {
        $name = $this->validated('name', '');

        if (empty($name)) {
            throw new InvalidatedValueException('name');
        }

        return $name;
    }

    /**
     * @return string
     */
    public function validatedEmail(): string
    {
        $email = $this->validated('email', '');

        if (empty($email)) {
            throw new InvalidatedValueException('email');
        }

        return $email;
    }
}
