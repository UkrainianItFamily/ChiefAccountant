<?php

namespace App\Actions\User;

use App\Events\SendUserContractToEmailEvent;
use App\Repositories\User\UserRepositoryInterface;
use stdClass;

final class SendUserContractToEmailAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(SendUserContractToEmailRequest $request)
    {
        $user = $this->userRepository->getUserById($request->getUserId());

        $data = new stdClass();
        $data->id = $request->getUserId();
        $data->name = $user->name;
        $data->email = $user->email;
        $data->description = $request->getDescription();
        $data->file_path = $_FILES['upload']['tmp_name'];
        $data->file_name = $_FILES['upload']['name'];
        $data->mail_to = config('mail.from.address');

        event(new SendUserContractToEmailEvent($data));
    }
}
