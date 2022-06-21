<?php

namespace App\Actions\User\Admin;

use App\Models\User;

class UpdateUserAccessResponse
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
