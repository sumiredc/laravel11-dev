<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\FormRequest;
use App\Models\User;

final class UserIndexRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->can('index', User::class);
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [];
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
