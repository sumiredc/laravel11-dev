<?php

namespace App\UseCases\Profile;

use App\Repositories\FileRepository;

final class ProfileUploadUseCase
{
    /**
     * @param FileRepository $fileRepository
     */
    public function __construct(
        private readonly FileRepository $fileRepository
    ) {
    }

    /**
     * @param ProfileUploadInput $input
     * @return string
     */
    public function execute(ProfileUploadInput $input): string
    {
        $path = $this->fileRepository->upload($input);
        return $path;
    }
}
