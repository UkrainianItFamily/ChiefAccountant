<?php


namespace App\Actions\User;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class UpdateUserListAdminAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateUserListAdminRequest $request): UpdateUserListAdminResponse
    {
        $updateUser = $this->userRepository->getUserById($request->getId());
        $password = $request->getPassword();

        if(isset($password)) {
            $updateUser->password = Hash::make($request->getPassword());
        }
        $updateUser->email = $request->getEmail();
        $updateUser->is_admin = $request->getIsAdmin();
        $updateUser->date_to = $request->getDateTo();
        $updateUser->date_from = $request->getDateFrom();

        $this->userRepository->updateUser($updateUser);

        return new UpdateUserListAdminResponse($updateUser);
    }
}
