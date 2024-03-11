<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserDestroyRequest;
use App\Models\User;
use App\UseCases\User\UserDestroyUseCase;
use Exception;
use Illuminate\Http\RedirectResponse;

final class UserDestroyController extends Controller
{
    /**
     * @param UserDestroyUseCase $userDestroyUseCase
     */
    public function __construct(
        public readonly UserDestroyUseCase $userDestroyUseCase
    ) {
    }

    /**
     * @param  UserDestroyRequest $request
     * @param  User               $user
     * @return RedirectResponse
     */
    public function __invoke(UserDestroyRequest $request, User $user): RedirectResponse
    {
        try {
            $this->userDestroyUseCase->execute($user);

            return redirect(route('user.index'))
                ->with(['success' => __('Deleted successfully.')]);;
        } catch (Exception $ex) {
            $this->rollback();
            throw $ex;
        }
    }
}
