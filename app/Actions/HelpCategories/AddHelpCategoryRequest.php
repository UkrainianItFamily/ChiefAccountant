<?php

declare(strict_types=1);

namespace App\Actions\HelpCategories;

class AddHelpCategoryRequest
{
    private string $title;

    public function __construct(
        string $title
    ) {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
