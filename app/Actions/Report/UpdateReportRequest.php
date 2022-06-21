<?php

declare(strict_types=1);

namespace App\Actions\Report;

class UpdateReportRequest
{
    private int $id;

    private string $slug;

    private string $title;

    private string $category;

    private ?array $appsIdArray;

    private ?array $redactionsIdArray;

    private ?array $deleteRedactionsIdArray;

    public function __construct(
        int $id,
        string $slug,
        string $title,
        string $category,
        ?array $appsIdArray,
        ?array $redactionsIdArray,
        ?array $deleteRedactionsIdArray
    ) {
        $this->id = $id;
        $this->slug = $slug;
        $this->title = $title;
        $this->category = $category;
        $this->appsIdArray = $appsIdArray;
        $this->redactionsIdArray = $redactionsIdArray;
        $this->deleteRedactionsIdArray = $deleteRedactionsIdArray;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getAppsIdArray(): ?array
    {
        return $this->appsIdArray;
    }

    public function getRedactionsIdArray(): ?array
    {
        return $this->redactionsIdArray;
    }

    public function getDeleteRedactionsIdArray(): ?array
    {
        return $this->deleteRedactionsIdArray;
    }
}
