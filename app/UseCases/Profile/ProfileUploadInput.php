<?php

namespace App\UseCases\Profile;

use App\Enums\StorageDisk;
use App\UseCases\File\FileUploadInputInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

readonly final class ProfileUploadInput implements FileUploadInputInterface
{
    public readonly string $dir;
    public readonly string $mimeType;
    public readonly string $filename;
    public readonly string $path;
    public readonly string $originalName;
    public readonly string $extension;
    public readonly StorageDisk $disk;

    /**
     * @param UploadedFile $file
     * @param string $filename
     */
    public function __construct(
        public readonly UploadedFile $file,
        string $filename = '',
    ) {
        $this->filename = empty($filename)
            ? Str::uuid()->toString()
            : $filename;

        $this->dir = Str::replaceEnd('/', '', config('filesystems.paths.profile.dir', ''));
        $this->mimeType = Storage::mimeType($file->path());
        $this->originalName = $this->file->getClientOriginalName();
        $this->extension = $this->file->getClientOriginalExtension();
        $this->path = "{$this->dir}/{$this->filename}.{$this->extension}";
        $this->disk = config('filesystems.paths.profile.disk', StorageDisk::Local);
    }

    /**
     * @return array{path:string,mime_type:string,original_name:string,extension:string,disk:StorageDisk}
     */
    public function attributes(): array
    {
        return [
            'path' => $this->path,
            'mime_type' => $this->mimeType,
            'original_name' => $this->originalName,
            'extension' => $this->extension,
            'disk' => $this->disk,
        ];
    }
}
