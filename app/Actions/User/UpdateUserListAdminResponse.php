<?php


namespace App\Actions\User;

use App\Models\User;

class UpdateUserListAdminResponse
{
    private User $updatedUser;

    public function __construct(User $updatedUser)
    {
        $this->updatedUser = $updatedUser;
    }

    public function getResponse(): User
    {
        return $this->updatedUser;
    }
}
