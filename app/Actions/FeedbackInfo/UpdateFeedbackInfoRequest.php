<?php


namespace App\Actions\FeedbackInfo;


class UpdateFeedbackInfoRequest
{
    private int $feedbackId;
    private string $description;

    public function __construct(
        int $feedbackId,
        string $description
    ) {
        $this->feedbackId = $feedbackId;
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getFeedbackId(): int
    {
        return $this->feedbackId;
    }
}
