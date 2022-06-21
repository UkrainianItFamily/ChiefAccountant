<?php

declare(strict_types=1);

namespace App\Actions\News;

class UpdateNewsRequest
{
    private int $id;
    private string $slug;
    private string $title;
    private string $description;
    private string $text;
    private ?string $tags;

    public function __construct(
        int $id,
        string $slug,
        string $title,
        string $description,
        string $text,
        ?string $tags
    )
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->title = $title;
        $this->description = $description;
        $this->text = $text;
        $this->tags = $tags;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
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

    public function getId(): int
    {
        return $this->id;
    }
}
