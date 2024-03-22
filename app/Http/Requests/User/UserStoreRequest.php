<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Enums\Authority;
use App\Exceptions\Request\InvalidatedValueException;
use App\Http\Requests\FormRequest;
use App\Models\User;
use App\Rules\User\UserEmailRule;
use App\Rules\User\UserNameRule;
use Illuminate\Validation\Rules\Enum;
use InvalidArgumentException;

final class UserStoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->can('store', User::class);
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'authority' => ['required', app(Enum::class, ['type' => Authority::class])],
            'name' => ['required', app(UserNameRule::class)],
            'email' => ['required', app(UserEmailRule::class, ['table', app(User::class)->getTable()])],
        ];
    }

    /**
     * @return Authority
     * @throws InvalidArgumentException
     */
    public function validatedAuthority(): Authority
    {
        $value = intval($this->validated('authority', -1));
        $authority = Authority::tryFrom($value);

        if (is_null($authority)) {
            throw new InvalidArgumentException;
        }

        return $authority;
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
