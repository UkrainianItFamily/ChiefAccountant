<?php

declare(strict_types=1);

namespace App\Actions\Search;

class GetSearchResultRequest
{
    private string $searchQuery;

    public function __construct(
        string $searchQuery
    )
    {
        $this->searchQuery = $searchQuery;
    }

    public function getSearchQuery(): string
    {
        return $this->searchQuery;
    }
}
