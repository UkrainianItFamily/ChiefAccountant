<?php

namespace App\Actions\User;

use App\Exceptions\UpdatePersonalData\InvalidOldPasswordErrorException;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class UpdateUserPasswordAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateUserPasswordRequest $request): UpdateUserPasswordResponse
    {
            $updateUser = $this->userRepository->getUserById($request->getUserId());

            if (!Hash::check((string)$request->getOldPassword(), $updateUser->password)) {
                throw new InvalidOldPasswordErrorException('Ошибка "Неверный старый пароль"');
            }

            $updateUser->password = Hash::make($request->getNewPassword());

            $this->userRepository->updateUser($updateUser);

            return new UpdateUserPasswordResponse($updateUser);
    }
}
