<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetReportSubCategoriesResponse implements ActionsResponseCollectionInterface
{
    private Collection $subCategories;

    public function __construct(Collection $subCategories)
    {
        $this->subCategories = $subCategories;
    }

    public function getResponse(): Collection
    {
        return $this->subCategories;
    }
}
