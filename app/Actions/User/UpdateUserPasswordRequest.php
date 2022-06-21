<?php

namespace App\Actions\User;

class UpdateUserPasswordRequest
{
    private int $id;
    private string $oldPassword;
    private string $newPassword;

    public function __construct(
        int $id,
        string $oldPassword,
        string $newPassword
    )
    {
        $this->id = $id;
        $this->oldPassword = $oldPassword;
        $this->newPassword = $newPassword;
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }
}
