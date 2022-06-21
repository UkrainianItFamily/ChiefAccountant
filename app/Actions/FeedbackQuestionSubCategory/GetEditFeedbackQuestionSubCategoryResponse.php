<?php


namespace App\Actions\FeedbackQuestionSubCategory;

use App\Models\FeedbackCategory;

final class GetEditFeedbackQuestionSubCategoryResponse
{
    private ?FeedbackCategory $reports;

    public function __construct(?FeedbackCategory $reports)
    {
        $this->reports = $reports;
    }

    public function getResponse(): ?FeedbackCategory
    {
        return $this->reports;
    }
}
