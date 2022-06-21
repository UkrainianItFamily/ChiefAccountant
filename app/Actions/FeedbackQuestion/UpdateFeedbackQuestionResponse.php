<?php


namespace App\Actions\FeedbackQuestion;


use App\Contracts\ActionsResponseModelInterface;
use App\Models\FeedbackCategory;

class UpdateFeedbackQuestionResponse implements ActionsResponseModelInterface
{
    private FeedbackCategory $updatedFeedbackCategory;

    public function __construct(FeedbackCategory $feedbackCategory)
    {
        $this->updatedFeedbackCategory = $feedbackCategory;
    }

    public function getResponse(): FeedbackCategory
    {
        return $this->updatedFeedbackCategory;
    }
}
