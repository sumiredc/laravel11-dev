<?php

declare(strict_types=1);

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileShowRequest;
use App\Models\Profile;
use App\Repositories\FileRepository;
use Illuminate\Http\Response;

final class ProfileShowController extends Controller
{
    /**
     * @param FileRepository $fileRepository
     */
    public function __construct(
        private readonly FileRepository $fileRepository
    ) {
    }

    /**
     * @param ProfileShowRequest $request
     * @param Profile $profile
     * @return Response
     */
    public function __invoke(ProfileShowRequest $request, Profile $profile): Response
    {
        $content = $this->fileRepository
            ->getContent($profile->path);

        return response($content)
            ->header('Content-Type', $profile->mime_type);
    }
}
