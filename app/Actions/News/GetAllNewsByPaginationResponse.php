<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\ActionsResponsePaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAllNewsByPaginationResponse implements ActionsResponsePaginationInterface
{
    private LengthAwarePaginator $news;

    public function __construct(LengthAwarePaginator $news)
    {
        $this->news = $news;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->news;
    }
}
