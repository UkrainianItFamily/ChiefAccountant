<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

class UpdateReportCategoryRequest
{
    private int $id;

    private string $slug;

    private string $name;

    private ?int $parentCategoryId;

    public function __construct(
        int $id,
        string $slug,
        string $name,
        ?int $parentCategoryId
    ) {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
        $this->parentCategoryId = $parentCategoryId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getParentCategoryId(): ?int
    {
        return $this->parentCategoryId;
    }
}
