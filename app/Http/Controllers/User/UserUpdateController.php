<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\UseCases\User\UserUpdateInput;
use App\UseCases\User\UserUpdateUseCase;
use Exception;
use Illuminate\Http\RedirectResponse;

final class UserUpdateController extends Controller
{
    /**
     * @param UserUpdateUseCase $userUpdateUseCase
     */
    public function __construct(
        private readonly UserUpdateUseCase $userUpdateUseCase
    ) {
    }

    /**
     * @param  UserUpdateRequest $request
     * @param  User              $user
     * @return RedirectResponse
     */
    public function __invoke(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $name = $request->validatedName();
        $email = $request->validatedEmail();
        $input = app(UserUpdateInput::class, compact('name', 'email'));

        $this->begin();
        try {
            $this->userUpdateUseCase->execute($user, $input);
            $request->session()->regenerateToken();
            $this->commit();

            return redirect(route('user.edit', $user))
                ->with(['success' => __('Updated successfully.')]);
        } catch (Exception $ex) {
            $this->rollback();
            throw $ex;
        }
    }
}
