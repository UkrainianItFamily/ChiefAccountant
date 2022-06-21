<?php

declare(strict_types=1);

namespace App\Actions\Report;

class GetReportsListRequest
{
    private string $categorySlug;

    public function __construct(string $categorySlug)
    {
        $this->categorySlug = $categorySlug;
    }

    public function getCategorySlug(): string
    {
        return $this->categorySlug;
    }
}
