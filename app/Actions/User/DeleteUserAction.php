<?php

namespace App\Actions\User;

use App\Repositories\User\UserRepositoryInterface;

final class DeleteUserAction
{
     private UserRepositoryInterface $userRepository;

     public function __construct(UserRepositoryInterface $userRepository)
     {
         $this->userRepository = $userRepository;
     }

    public function execute(DeleteUserRequest $request): void
    {
        $user = $this->userRepository->getUserById($request->getId());

        $this->userRepository->deleteUser($user);
    }
}
