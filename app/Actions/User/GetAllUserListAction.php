<?php


namespace App\Actions\User;

use App\Repositories\User\Criterion\UserByEmailCriterion;
use App\Repositories\User\Criterion\UserByIdCriterion;
use App\Repositories\User\Criterion\UserByPhoneCriterion;
use App\Repositories\User\UserRepositoryInterface;

final class GetAllUserListAction
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function execute(GetAllUserListRequest $request): GetAllUserListResponse
    {
        $criteria = [];

        if ($request->getId()) {
            $criteria[] = new UserByIdCriterion($request->getId());
        }

       if ($request->getEmail()) {
            $criteria[] = new UserByEmailCriterion($request->getEmail());
        }

        if ($request->getPhone()) {
            $criteria[] = new UserByPhoneCriterion($request->getPhone());
        }

        $users = $this->userRepositoryInterface->findByCriteria($criteria);

        return new GetAllUserListResponse($users);
    }
}
