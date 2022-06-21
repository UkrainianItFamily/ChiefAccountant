<?php

namespace App\Actions\User;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\User;

class UpdateUserPasswordResponse implements ActionsResponseModelInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getResponse(): User
    {
        return $this->user;
    }
}
