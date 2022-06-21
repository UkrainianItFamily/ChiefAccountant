<?php

declare(strict_types=1);

namespace App\Actions\Help;

class AddHelpRequest
{
    private string $title;
    private string $description;
    private int $categoryId;

    public function __construct(
        string $title,
        string $description,
        int $categoryId
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->categoryId = $categoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
}
