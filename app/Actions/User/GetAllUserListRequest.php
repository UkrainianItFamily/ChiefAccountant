<?php


namespace App\Actions\User;


class GetAllUserListRequest
{
    private int $id;
    private ?string $email;
    private ?string $phone;

    public function __construct(
        int $id,
        ?string $email,
        ?string $phone
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }
}
