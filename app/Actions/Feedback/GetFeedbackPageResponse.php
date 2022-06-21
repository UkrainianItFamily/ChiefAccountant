<?php


namespace App\Actions\Feedback;

use Illuminate\Support\Collection;

class GetFeedbackPageResponse
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
