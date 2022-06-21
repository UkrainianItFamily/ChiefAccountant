<?php


namespace App\Actions\Feedback;

use Illuminate\Database\Eloquent\Collection;

class GetShowFeedbackByIdResponse
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
