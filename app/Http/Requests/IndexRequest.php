<?php

declare(strict_types=1);

namespace App\Http\Requests;

final class IndexRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
