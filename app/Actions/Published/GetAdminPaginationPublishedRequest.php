<?php

namespace App\Actions\Published;

class GetAdminPaginationPublishedRequest extends \App\Actions\Published\GetPaginationPublishedRequest
{
    private int $offset;

    public function __construct(int $offset)
    {
        $this->offset = $offset;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}
