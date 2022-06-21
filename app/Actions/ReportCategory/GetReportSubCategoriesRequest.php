<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

class GetReportSubCategoriesRequest
{
    private string $mainCategorySlug;

    public function __construct(string $mainCategorySlug)
    {
        $this->mainCategorySlug = $mainCategorySlug;
    }

    public function getMainCategorySlug(): string
    {
        return $this->mainCategorySlug;
    }
}
