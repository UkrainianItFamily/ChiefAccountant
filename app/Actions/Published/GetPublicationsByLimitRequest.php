<?php

namespace App\Actions\Published;

class GetPublicationsByLimitRequest
{
    private int $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }
}
