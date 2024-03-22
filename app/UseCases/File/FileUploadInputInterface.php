<?php

namespace App\UseCases\File;

use App\Enums\StorageDisk;
use Illuminate\Http\UploadedFile;

/**
 * @property-read UploadedFile $file
 * @property-read ?string $filename
 * @property-read string $dir
 * @property-read string $path
 * @property-read string $mimeType
 * @property-read string $originalName
 * @property-read string $extension
 * @property-read StorageDisk $disk
 */
interface FileUploadInputInterface
{
    /**
     * @return array{path:string,mime_type:string,original_name:string,extension:string,disk:StorageDisk}
     */
    public function attributes(): array;
}
