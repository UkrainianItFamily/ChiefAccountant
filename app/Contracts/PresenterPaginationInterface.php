<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PresenterPaginationInterface
{
    public function presentPagination(LengthAwarePaginator $lengthAwarePaginator): array;
}
