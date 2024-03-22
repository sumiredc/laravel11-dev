<?php

declare(strict_types=1);

namespace App\View\Components\Organism\Profile;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class UploadModal extends Component
{
    /**
     * @param User $user
     */
    public function __construct(
        public readonly User $user
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.organism.profile.upload-modal');
    }
}
