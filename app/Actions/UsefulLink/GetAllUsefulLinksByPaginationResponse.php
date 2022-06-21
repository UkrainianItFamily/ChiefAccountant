<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Contracts\ActionsResponsePaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAllUsefulLinksByPaginationResponse implements ActionsResponsePaginationInterface
{
    private LengthAwarePaginator $usefulLinks;

    public function __construct(LengthAwarePaginator $usefulLinks)
    {
        $this->usefulLinks = $usefulLinks;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->usefulLinks;
    }
}
