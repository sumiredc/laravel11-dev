<?php

declare(strict_types=1);

namespace App\Http\Controllers\SingIn;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignIn\SignInStoreRequest;
use App\UseCases\SignIn\SignInStoreUseCase;
use Illuminate\Http\RedirectResponse;

final class SignInStoreController extends Controller
{
    /**
     * @param SignInStoreUseCase $signInStoreUseCase
     */
    public function __construct(
        private SignInStoreUseCase $signInStoreUseCase
    ) {
    }

    /**
     * @param  SignInStoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(SignInStoreRequest $request): RedirectResponse
    {
        $email = $request->validatedEmail();
        $password = $request->validatedPassword();

        $this->signInStoreUseCase
            ->execute($email, $password);

        return redirect(route('user.index'));
    }
}
