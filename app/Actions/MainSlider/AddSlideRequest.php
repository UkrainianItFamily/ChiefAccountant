<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

class AddSlideRequest
{
    private string $title;
    private string $description;
    private int $position;
    private ?string $link;

    public function __construct(
        string $title,
        string $description,
        int $position,
        ?string $link
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->position = $position;
        $this->link = $link;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }
}
