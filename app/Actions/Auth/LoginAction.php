<?php

namespace App\Actions\Auth;

use App\Exceptions\Auth\UserNotFoundException;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

final class LoginAction
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginRequest $request): void
    {
        $userName = $request->getUserName();
        $password = $request->getPassword();
        $remember = $request->getRemember();

        $loginOnEmail = filter_var($request->getUserName(), FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        Auth::guard()->attempt([$loginOnEmail => $userName, 'password' => $password], $remember);

        if (!Auth::user()) {
            throw new UserNotFoundException('Логин или пароль введены не верно');
        }
    }
}
