<?php

declare(strict_types=1);

namespace App\Actions\User;

class AddUserRequest
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private ?bool $is_entity;
    private ?string $company_name;
    private ?string $phone;
    private ?string $company_address;
    private ?int $company_id;
    private ?string $company_code;

    public function __construct(
        string $name,
        string $surname,
        string $email,
        string $password,
        ?bool $is_entity,
        ?string $company_name,
        ?string $phone,
        ?string $company_address,
        ?int $company_id,
        ?string $company_code
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->is_entity = $is_entity;
        $this->company_name = $company_name;
        $this->phone = $phone;
        $this->company_address = $company_address;
        $this->company_id = $company_id;
        $this->company_code = $company_code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getCompanyAddress(): ?string
    {
        return $this->company_address;
    }

    public function getCompanyId(): ?int
    {
        return $this->company_id;
    }

    public function getCompanyCode(): ?string
    {
        return $this->company_code;
    }

    public function getIsEntity(): ?bool
    {
        return $this->is_entity;
    }
}
