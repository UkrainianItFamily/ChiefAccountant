<?php

declare(strict_types=1);

namespace App\Repositories\Search;

use Illuminate\Pagination\LengthAwarePaginator;

interface SearchRepositoryInterface
{
    public function getSearchResult(string $searchQuery, array $searchingTablesArray): LengthAwarePaginator;
}
