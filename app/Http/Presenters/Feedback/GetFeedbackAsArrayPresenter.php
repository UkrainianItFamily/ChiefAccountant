<?php

namespace App\Http\Presenters\Feedback;

use App\Contracts\PresenterCollectionInterface;
use App\Http\Presenters\FeedbackCategory\GetFeedbackCategoryPresenter;
use App\Models\Feedback;
use App\Models\FeedbackCategory;
use Illuminate\Database\Eloquent\Collection;

class GetFeedbackAsArrayPresenter implements PresenterCollectionInterface
{

    public function presentCollection(Collection $collection): array
    {
        return $collection
            ->map(
                function (Feedback $feedback) {
                    return $this->present($feedback);
                }
            )
            ->all();
    }

    public function present(Feedback $feedback): array
    {
        $arrayFeedback = [
            'id' => $feedback->getId(),
            'name' => $feedback->getName(),
            'email' => $feedback->getEmail(),
            'phone' => $feedback->getPhone(),
            'description' => $feedback->getDescription(),
            'title' => $feedback->categories->getTitle(),
        ];

        return $arrayFeedback;
    }
}
