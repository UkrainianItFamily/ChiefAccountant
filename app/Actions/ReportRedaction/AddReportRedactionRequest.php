<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

class AddReportRedactionRequest
{
    private string $date;

    private string $title;

    private string $description;

    private ?int $reportId;

    public function __construct(
        string $date,
        string $title,
        string $description,
        ?int $reportId = null
    ) {
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
        $this->reportId = $reportId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getReportId(): ?int
    {
        return $this->reportId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
