<?php

declare(strict_types=1);

namespace App\Actions\Published;

class UpdatePublicationRequest
{
    private int $id;
    private string $description;
    private string $link;
    private string $date;

    public function __construct(
        int $id,
        string $description,
        string $link,
        string $date
    )
    {
        $this->id = $id;
        $this->description = $description;
        $this->link = $link;
        $this->date = $date;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
