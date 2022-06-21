<?php

declare(strict_types=1);

namespace App\Actions\FeedbackQuestionSubCategory;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\FeedbackCategory;

final class AddFeedbackQuestionSubCategoryResponse implements ActionsResponseModelInterface
{
    private FeedbackCategory $feedbackCategory;

    public function __construct(FeedbackCategory $feedbackCategory)
    {
        $this->feedbackCategory = $feedbackCategory;
    }

    public function getResponse(): FeedbackCategory
    {
        return $this->feedbackCategory;
    }
}
