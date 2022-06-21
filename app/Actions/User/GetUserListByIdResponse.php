<?php


namespace App\Actions\User;

use App\Models\User;

class GetUserListByIdResponse
{
    private User $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function getResponse(): User
    {
        return $this->users;
    }
}
