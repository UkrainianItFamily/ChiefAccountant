<?php

declare(strict_types=1);

namespace App\Actions\Search;

use App\Contracts\ActionsResponsePaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetSearchResultResponse implements ActionsResponsePaginationInterface
{
    private LengthAwarePaginator $searchResult;

    public function __construct(LengthAwarePaginator $searchResult)
    {
        $this->searchResult = $searchResult;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->searchResult;
    }
}
