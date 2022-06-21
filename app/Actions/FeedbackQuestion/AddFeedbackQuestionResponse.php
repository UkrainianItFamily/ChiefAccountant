<?php

declare(strict_types=1);

namespace App\Actions\FeedbackQuestion;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\FeedbackCategory;


final class AddFeedbackQuestionResponse implements ActionsResponseModelInterface
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
