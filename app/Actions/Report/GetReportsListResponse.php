<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetReportsListResponse implements ActionsResponseCollectionInterface
{
    private Collection $reports;

    public function __construct(Collection $reports)
    {
        $this->reports = $reports;
    }

    public function getResponse(): Collection
    {
        return $this->reports;
    }
}
