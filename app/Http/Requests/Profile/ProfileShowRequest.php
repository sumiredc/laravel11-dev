<?php

declare(strict_types=1);

namespace App\Http\Requests\Profile;

use App\Http\Requests\FormRequest;

final class ProfileShowRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->can('show', $this->route('profile'));
    }
}
