<?php


namespace App\Actions\FeedbackQuestion;

use App\Models\FeedbackCategory;

final class GetEditFeedbackQuestionResponse
{
    private FeedbackCategory $reports;

    public function __construct(FeedbackCategory $reports)
    {
        $this->reports = $reports;
    }

    public function getResponse(): FeedbackCategory
    {
        return $this->reports;
    }
}
