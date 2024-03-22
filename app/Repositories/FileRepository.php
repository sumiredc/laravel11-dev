<?php

namespace App\Repositories;

use App\Enums\StorageDisk;
use App\Exceptions\File\DeleteFailedException;
use App\Exceptions\File\InvalidFileException;
use App\Exceptions\File\NoFileException;
use App\UseCases\File\FileUploadInputInterface;
use Illuminate\Support\Facades\Storage;

final class FileRepository
{
    /**
     * @param string $path
     * @param StorageDisk $disk
     * @return string
     */
    public function getContent(
        string $path,
        StorageDisk $disk = StorageDisk::Local
    ): string {
        $content = Storage::disk($disk->value)->get($path);

        if (is_null($content)) {
            throw new NoFileException($path);
        }

        return $content;
    }

    /**
     * @param FileUploadInputInterface $input
     * @return string
     * @throws InvalidFileException|NoFileException
     */
    public function upload(FileUploadInputInterface $input): string
    {
        $path = $input->file
            ->storeAs(
                $input->dir,
                "{$input->filename}.{$input->extension}",
                ['disk' => $input->disk->value]
            );

        if ($path !== $input->path) {
            $this->delete($input->disk, $input->path);

            throw new InvalidFileException($input->path, $path);
        }

        if (!Storage::fileExists($path)) {
            throw new NoFileException($path);
        }

        return $path;
    }

    /**
     * @param StorageDisk $disk
     * @param string $path
     * @return void
     * @throws DeleteFailedException
     */
    public function delete(StorageDisk $disk, string $path): void
    {
        if (Storage::disk($disk->value)->delete($path)) {
            return;
        }

        throw new DeleteFailedException($path);
    }
}
