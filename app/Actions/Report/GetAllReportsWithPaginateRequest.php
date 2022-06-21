<?php

declare(strict_types=1);

namespace App\Actions\Report;

class GetAllReportsWithPaginateRequest
{
    private int $perPage;

    public function __construct(int $perPage)
    {
        $this->perPage = $perPage;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }
}
