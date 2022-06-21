<?php


namespace App\Actions\FeedbackQuestion;

use Illuminate\Support\Collection;

class GetShowFeedbackQuestionByIdResponse
{
    private Collection $reports;

    public function __construct(Collection $reports)
    {
        $this->reports = $reports;
    }

    public function getResponse(): Collection
    {
        return $this->reports;
    }
}
