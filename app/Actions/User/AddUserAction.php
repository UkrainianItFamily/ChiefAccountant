<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Actions\Auth\ConfirmedEmailAction;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

final class AddUserAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository, ConfirmedEmailAction $confirmedEmailAction)
    {
        $this->userRepository = $userRepository;
        $this->confirmedEmailAction = $confirmedEmailAction;
    }

    public function execute(AddUserRequest $request): AddUserResponse
    {
        $user = new User();

        $user->name = $request->getName();
        $user->surname = $request->getSurname();
        $user->email = $request->getEmail();
        $user->password = Hash::make($request->getPassword());

        if ($request->getIsEntity()) {
            $user->is_entity = $request->getIsEntity();
            $user->company_name = $request->getCompanyName();
            $user->phone = $request->getPhone();
            $user->company_address = $request->getCompanyAddress();
            $user->company_id = $request->getCompanyId();
            $user->company_code = $request->getCompanyCode();
        }

        $newUser = $this->userRepository->saveUser($user);

        event(new Registered($newUser));

        return new AddUserResponse($newUser);
    }
}
