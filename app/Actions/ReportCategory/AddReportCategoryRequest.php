<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

class AddReportCategoryRequest
{
    private string $name;

    private ?int $parentCategoryId;

    public function __construct(
        string $name,
        ?int $parentCategoryId
    ) {
        $this->name = $name;
        $this->parentCategoryId = $parentCategoryId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParentCategoryId(): ?int
    {
        return $this->parentCategoryId;
    }
}
