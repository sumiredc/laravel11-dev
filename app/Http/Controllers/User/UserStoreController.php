<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\UseCases\User\UserStoreInput;
use App\UseCases\User\UserStoreUseCase;
use Exception;
use Illuminate\Http\RedirectResponse;

final class UserStoreController extends Controller
{
    /**
     * @param UserStoreUseCase $userStoreUseCase
     */
    public function __construct(
        private readonly UserStoreUseCase $userStoreUseCase
    ) {
    }

    /**
     * @param  UserStoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(UserStoreRequest $request): RedirectResponse
    {
        $name = $request->validatedName();
        $email = $request->validatedEmail();
        $authority = $request->validatedAuthority();
        $input = app(UserStoreInput::class, compact('authority', 'name', 'email'));

        $this->begin();
        try {
            $user = $this->userStoreUseCase->execute($input);
            $request->session()->regenerateToken();
            $this->commit();

            return redirect(route('user.edit', $user))
                ->with(['success' => __('Created successfully.')]);
        } catch (Exception $ex) {
            $this->rollback();
            throw $ex;
        }
    }
}
