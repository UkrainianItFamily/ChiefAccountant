<?php

namespace App\Actions\Auth;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Password;

final class SendLinkForgotPasswordAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(SendLinkForgotPasswordRequest $request)
    {
        $username = $request->getUserName();

        $loginOnEmail = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        if ($loginOnEmail === 'login') {
            $user = $this->userRepository->getUserByLogin($username);
        } else {
            $user = $this->userRepository->getUserByEmail($username);
        }

        $token = Password::createToken($user);

        $user->sendPasswordResetNotification($token);
    }
}
