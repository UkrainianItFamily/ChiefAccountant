<?php

namespace App\Actions\User;

class SendUserContractToEmailRequest
{
    private int $id;
    private string $description;

    public function __construct(
        int $id,
        string $description
    ) {
        $this->id = $id;
        $this->description = $description;
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
