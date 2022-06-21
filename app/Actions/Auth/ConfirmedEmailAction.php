<?php

namespace App\Actions\Auth;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use PharIo\Manifest\InvalidEmailException;

final class ConfirmedEmailAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(ConfirmedEmailRequest $request)
    {
        $user = $this->userRepository->getUserById($request->getId());

        $this->userRepository->markUserEmail($user);

        if (!hash_equals((string)$request->getHash(), sha1($user->getEmailForVerification()))) {
            throw new InvalidEmailException();
        }

        if (!$user->hasVerifiedEmail()) {
            $this->userRepository->markUserEmail($user);
        } else {
            return redirect()
                ->route('index')
                ->with(['success' => 'Почта подтверждена']);
        }
    }
}
