<?php


namespace App\Actions\User;

class UpdateUserListAdminRequest
{
    private int $id;
    private ?string $password;
    private string $email;
    private int $isAdmin;
    private ?string $dateFrom;
    private ?string $dateTo;


    public function __construct(
        int $id,
        ?string $password,
        string $email,
        int $isAdmin,
        ?string $dateFrom,
        ?string $dateTo
    ) {
        $this->id = $id;
        $this->password = $password;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getIsAdmin(): int
    {
        return $this->isAdmin;
    }

    public function getDateFrom(): ?string
    {
        return $this->dateFrom;
    }

    public function getDateTo(): ?string
    {
        return $this->dateTo;
    }
}
