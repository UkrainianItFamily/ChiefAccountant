<?php

namespace App\Actions\User\Admin;

class UpdateUserAccessRequest
{
    private int $id;
    private ?int $numberContract;
    private ?string $dateFrom;
    private ?string $dateTo;

    public function __construct(
        int $id,
        ?int $numberContract,
        ?string $dateFrom,
        ?string $dateTo
    ) {
        $this->id = $id;
        $this->numberContract = $numberContract;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }
    public function getUserId(): int
    {
        return $this->id;
    }

    public function getNumberContract(): ?int
    {
        return $this->numberContract;
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
