<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Pagination\Paginator;

interface PresenterSimplePaginationInterface
{
    public function presentPagination(Paginator $paginator): array;
}
