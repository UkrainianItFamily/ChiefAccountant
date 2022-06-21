<?php

namespace App\Actions\Auth;

class ResetPasswordRequest
{
    private string $email;
    private string $token;
    private string $password;

    public function __construct(string $token, string $email, string $password)
    {
        $this->email = $email;
        $this->token = $token;
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
