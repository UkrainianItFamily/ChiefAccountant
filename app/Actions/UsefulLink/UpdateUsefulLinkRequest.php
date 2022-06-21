<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

class UpdateUsefulLinkRequest
{
    private int $id;
    private string $title;
    private string $link;

    public function __construct(
        int $id,
        string $title,
        string $link
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
