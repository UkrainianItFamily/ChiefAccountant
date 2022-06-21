<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

class UpdateReportRedactionRequest
{
    private int $id;

    private string $date;

    private string $title;

    private string $description;

    public function __construct(
        int $id,
        string $date,
        string $title,
        string $description
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
