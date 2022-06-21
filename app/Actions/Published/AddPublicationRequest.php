<?php

declare(strict_types=1);

namespace App\Actions\Published;

class AddPublicationRequest
{
    private string $description;
    private string $link;
    private string $date;

    public function __construct(
        string $description,
        string $link,
        string $date
    )
    {
        $this->description = $description;
        $this->link = $link;
        $this->date = $date;
    }

    public function getLink(): string
    {
        return $this->link;
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
