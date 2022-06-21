<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetAllReportCategoriesResponse implements ActionsResponseCollectionInterface
{
    private Collection $categories;

    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    public function getResponse(): Collection
    {
        return $this->categories;
    }
}
