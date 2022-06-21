<?php

declare(strict_types=1);

namespace App\Actions\FeedbackQuestionSubCategory;

class AddFeedbackQuestionSubCategoryRequest
{
    private int $parentCategoryId;
    private string $title;

    public function __construct(
        int $parentCategoryId,
        string $title
    ) {
        $this->parentCategoryId = $parentCategoryId;
        $this->title = $title;
    }

    public function getCategoryId(): int
    {
        return $this->parentCategoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
