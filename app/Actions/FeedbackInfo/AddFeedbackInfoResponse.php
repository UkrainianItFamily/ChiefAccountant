<?php

declare(strict_types=1);

namespace App\Actions\FeedbackInfo;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\FeedbackInfo;

final class AddFeedbackInfoResponse implements ActionsResponseModelInterface
{
    private FeedbackInfo $feedbackInfo;

    public function __construct(FeedbackInfo $feedbackInfo)
    {
        $this->feedbackInfo = $feedbackInfo;
    }

    public function getResponse(): FeedbackInfo
    {
        return $this->feedbackInfo;
    }
}
