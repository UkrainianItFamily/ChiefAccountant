<?php

declare(strict_types=1);

namespace App\Actions\Report;

class GetReportBySlugRequest
{
    private string $slug;

    private ?string $redactionDate;

    public function __construct(
        string $slug,
        ?string $redactionDate
    ){
        $this->slug = $slug;
        $this->redactionDate = $redactionDate;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getRedactionDate(): ?string
    {
        return $this->redactionDate;
    }
}
