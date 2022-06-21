<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\User;

final class AddUserResponse implements ActionsResponseModelInterface
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
