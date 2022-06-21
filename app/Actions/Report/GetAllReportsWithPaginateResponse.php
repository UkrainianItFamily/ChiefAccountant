<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Contracts\ActionsResponsePaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAllReportsWithPaginateResponse implements ActionsResponsePaginationInterface
{
    private LengthAwarePaginator $reports;

    public function __construct(LengthAwarePaginator $reports)
    {
        $this->reports = $reports;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->reports;
    }
}
