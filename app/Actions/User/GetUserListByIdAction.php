<?php


namespace App\Actions\User;

use App\Repositories\User\UserRepositoryInterface;

final class GetUserListByIdAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(GetUserListByIdRequest $request): GetUserListByIdResponse
    {

        $getEditUserPage = $this->userRepository->getUserById($request->getId());

        return new GetUserListByIdResponse($getEditUserPage);
    }
}
