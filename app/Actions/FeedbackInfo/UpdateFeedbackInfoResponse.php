<?php


namespace App\Actions\FeedbackInfo;


use App\Contracts\ActionsResponseModelInterface;
use App\Models\FeedbackInfo;

class UpdateFeedbackInfoResponse implements ActionsResponseModelInterface
{
    private FeedbackInfo $updatedFeedbackInfo;

    public function __construct(FeedbackInfo $updatedFeedbackInfo)
    {
        $this->updatedFeedbackInfo = $updatedFeedbackInfo;
    }

    public function getResponse(): FeedbackInfo
    {
        return $this->updatedFeedbackInfo;
    }
}
