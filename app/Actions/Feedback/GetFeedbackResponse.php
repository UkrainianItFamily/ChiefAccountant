<?php


namespace App\Actions\Feedback;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetFeedbackResponse implements ActionsResponseCollectionInterface
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
