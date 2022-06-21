<?php

namespace App\Actions\User\Admin;

use App\Repositories\User\UserRepositoryInterface;

final class UpdateUserAccessAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateUserAccessRequest $request): UpdateUserAccessResponse
    {
        $updateUser = $this->userRepository->getUserById($request->getUserId());
        $updateUser->number_contract = $request->getNumberContract();
        $updateUser->date_to = $request->getDateTo();
        $updateUser->date_from = $request->getDateFrom();

        $this->userRepository->updateUser($updateUser);

        return new UpdateUserAccessResponse($updateUser);
    }
}
