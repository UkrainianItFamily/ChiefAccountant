<?php


namespace App\Actions\FeedbackQuestion;


use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetParentsCategoryByIdResponse implements ActionsResponseCollectionInterface
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
