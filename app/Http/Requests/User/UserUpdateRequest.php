<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

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
        return $this->validated('name', '');
    }

    /**
     * @return string
     */
    public function validatedEmail(): string
    {
        return $this->validated('email', '');
    }
}
