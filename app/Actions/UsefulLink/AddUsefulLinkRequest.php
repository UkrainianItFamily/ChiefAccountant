<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

class AddUsefulLinkRequest
{
    private string $title;
    private string $link;

    public function __construct(
        string $title,
        string $link
    )
    {
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
}
