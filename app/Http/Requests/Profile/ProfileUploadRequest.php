<?php

declare(strict_types=1);

namespace App\Http\Requests\Profile;

use App\Exceptions\Request\InvalidatedValueException;
use App\Http\Requests\FormRequest;
use App\Models\Profile;
use App\Rules\Profile\ProfileFileRule;
use Illuminate\Http\UploadedFile;

final class ProfileUploadRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->can('upload', [Profile::class, $this->route('user')]);
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', app(ProfileFileRule::class)],
        ];
    }

    /**
     * @return UploadedFile
     */
    public function validatedFile(): UploadedFile
    {
        $file = $this->validated('file', null);

        if (is_null($file)) {
            throw new InvalidatedValueException('file');
        }

        return $file;
    }
}
