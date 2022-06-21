<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Constant\UsefulLinkConstant;

class GetUsefulLinksByLimitRequest
{
    private int $offset;
    private int $limit;

    public function __construct(int $offset = UsefulLinkConstant::DEFAULT_OFFSET, int $limit = UsefulLinkConstant::DEFAULT_PER_PAGE)
    {
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }
}
