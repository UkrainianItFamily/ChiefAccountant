<?php


namespace App\Actions\FeedbackInfo;

use App\Models\FeedbackInfo;

class GetEditFeedbackInfoResponse
{
    private FeedbackInfo $reports;

    public function __construct(FeedbackInfo $reports)
    {
        $this->reports = $reports;
    }

    public function getResponse(): FeedbackInfo
    {
        return $this->reports;
    }
}
