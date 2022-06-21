<?php

namespace App\Actions\Auth;


class ConfirmedEmailRequest
{
    private int $id;
    private string $hash;

    public function __construct(int $id, string $hash)
    {
        $this->id = $id;
        $this->hash = $hash;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}
