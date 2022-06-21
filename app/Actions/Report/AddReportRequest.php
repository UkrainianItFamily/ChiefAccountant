<?php

declare(strict_types=1);

namespace App\Actions\Report;

class AddReportRequest
{
    private string $title;

    private int $categoryId;

    private string $description;

    private string $date;

    private ?array $redactionsIdArray;

    private ?array $appsIdArray;

    public function __construct(
        string $title,
        int $categoryId,
        string $description,
        string $date,
        ?array $redactionsIdArray,
        ?array $appsIdArray
    ) {
        $this->title = $title;
        $this->categoryId = $categoryId;
        $this->description = $description;
        $this->date = $date;
        $this->redactionsIdArray = $redactionsIdArray;
        $this->appsIdArray = $appsIdArray;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getRedactionsIdArray(): ?array
    {
        return $this->redactionsIdArray;
    }

    public function getAppsIdArray(): ?array
    {
        return $this->appsIdArray;
    }
}
