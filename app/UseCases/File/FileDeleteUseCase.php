<?php

namespace App\UseCases\File;

use App\Enums\StorageDisk;
use App\Repositories\FileRepository;

final class FileDeleteUseCase
{
    /**
     * @param FileRepository $fileRepository
     */
    public function __construct(
        public readonly FileRepository $fileRepository
    ) {
    }

    /**
     * @param StorageDisk $disk
     * @param string $path
     * @return void
     */
    public function execute(StorageDisk $disk, string $path): void
    {
        $this->fileRepository->delete($disk, $path);
    }
}
