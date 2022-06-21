<?php

namespace App\Actions\Auth;

use App\Exceptions\Auth\ResetPasswordErrorException;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

final class ResetPasswordAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(ResetPasswordRequest $request)
    {
        $credentials = [
            'email' => $request->getEmail(),
            'token' => $request->getToken(),
            'password' => Hash::make($request->getPassword()),
        ];

        $resetPasswordStatus = Password::reset(
            $credentials,
            function ($user, $password) {
                $user->password = $password;
                $this->userRepository->saveUser($user);
            }
        );

        if ($resetPasswordStatus !== Password::PASSWORD_RESET) {
            throw new ResetPasswordErrorException('Ошибка сброса пароля. Пользователь с таким логином, либо email не существует');

        }
    }
}
