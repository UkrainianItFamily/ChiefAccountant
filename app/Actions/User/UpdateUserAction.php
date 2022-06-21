<?php

namespace App\Actions\User;

use App\Exceptions\UpdatePersonalData\WrongPasswordErrorException;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class UpdateUserAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateUserRequest $request): UpdateUserResponse
    {
        $updateUser = $this->userRepository->getUserById($request->getUserId());

        if (!Hash::check((string)$request->getPassword(), $updateUser->password)) {
            throw new WrongPasswordErrorException('Ошибка "Неверный пароль"');
        }

        $updateUser->name = $request->getName();
        $updateUser->surname = $request->getSurname();
        $updateUser->phone = $request->getPhone();
        $updateUser->company_code = $request->getCompanyCode();
        $updateUser->company_name = $request->getCompanyName();
        $updateUser->company_id = $request->getCompanyId();
        $updateUser->entrepreneurial_activity_id = $request->getEntrepreneurialActivity();

        $this->userRepository->updateUser($updateUser);

        return new UpdateUserResponse($updateUser);
    }
}
