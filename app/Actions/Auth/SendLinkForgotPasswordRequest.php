<?php

namespace App\Actions\Auth;

class SendLinkForgotPasswordRequest
{
    private string $userName;

    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }
}
