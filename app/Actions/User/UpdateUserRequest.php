<?php

namespace App\Actions\User;

class UpdateUserRequest
{
    private  int $id;
    private  string $name;
    private ?string $surname;
    private ?string $phone;
    private ?int $companyCode;
    private ?string $companyName;
    private ?int $companyId;
    private  string $password;
    private ?int $entrepreneurialActivity;

    public function __construct(
         int $id,
         string $name,
        ?string $surname,
        ?string $phone,
        ?int $companyCode,
        ?string $companyName,
        ?int $companyId,
         string $password,
        ?int $entrepreneurialActivity
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->companyName = $companyName;
        $this->companyCode = $companyCode;
        $this->companyId = $companyId;
        $this->password = $password;
        $this->entrepreneurialActivity = $entrepreneurialActivity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    public function getCompanyCode(): ?int
    {
        return $this->companyCode;
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEntrepreneurialActivity(): ?int
    {
        return $this->entrepreneurialActivity;
    }
}
