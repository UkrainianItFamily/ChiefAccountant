<?php

namespace App\Actions\Auth;

class LoginRequest
{
    private string $userName;
    private string $password;
    private ?bool $remember;

    public function __construct(
        string $userName,
        string $password,
        ?bool $remember
    )
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->remember = $remember;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRemember(): ?bool
    {
        return $this->remember;
    }
}
