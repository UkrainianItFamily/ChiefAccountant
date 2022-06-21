<?php

declare(strict_types=1);

namespace App\Actions\News;

class AddNewsRequest
{
    private string $title;
    private string $description;
    private string $text;
    private ?string $tags;

    public function __construct(
        string $title,
        string $description,
        string $text,
        ?string $tags
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->text = $text;
        $this->tags = $tags;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }
}
