<?php

declare(strict_types=1);

namespace App\Http\Actions\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileUploadRequest;
use App\Http\Resources\ComponentResource;
use App\Models\Profile;
use App\Models\User;
use App\UseCases\File\FileDeleteUseCase;
use App\UseCases\Profile\ProfileStoreUseCase;
use App\UseCases\Profile\ProfileUpdateUseCase;
use App\UseCases\Profile\ProfileUploadInput;
use App\UseCases\Profile\ProfileUploadUseCase;
use App\View\Components\Molecule\Profile\Image;
use Exception;

final class ProfileUploadAction extends Controller
{
    /**
     * @param ProfileStoreUseCase $profileStoreUseCase
     * @param ProfileUpdateUseCase $profileUpdateUseCase
     * @param ProfileUploadUseCase $profileUploadUseCase
     * @param FileDeleteUseCase $fileDeleteUseCase
     */
    public function __construct(
        public readonly ProfileStoreUseCase $profileStoreUseCase,
        public readonly ProfileUpdateUseCase $profileUpdateUseCase,
        public readonly ProfileUploadUseCase $profileUploadUseCase,
        public readonly FileDeleteUseCase $fileDeleteUseCase,
    ) {
    }

    /**
     * @param ProfileUploadRequest $request
     * @param User $user
     * @return void
     */
    public function __invoke(
        ProfileUploadRequest $request,
        User $user
    ) {
        $file = $request->validatedFile();
        $input = app(ProfileUploadInput::class, compact('file'));

        $this->begin();
        try {
            $profile = $this->flow($user, $input);
            $this->commit();
            $component = app(Image::class, compact('profile'));
            return app(ComponentResource::class, compact('component'));
        } catch (Exception $ex) {
            $this->rollback();
            throw $ex;
        }
    }

    /**
     * @param User $user
     * @param ProfileUploadInput $input
     * @return Profile
     */
    private function flow(User $user, ProfileUploadInput $input): Profile
    {
        $profile = $user->profile;

        if (is_null($profile)) {
            // Store
            $profile = $this->profileStoreUseCase->execute($user, $input);
            $this->profileUploadUseCase->execute($input);
        } else {
            // Update
            $disk = $profile->disk;
            $path = $profile->path;
            $profile = $this->profileUpdateUseCase->execute($profile, $input);
            $this->profileUploadUseCase->execute($input);
            $this->fileDeleteUseCase->execute($disk, $path);
        }

        return $profile;
    }
}
