<?php


namespace App\Actions\Feedback;

use App\Repositories\Feedback\FeedbackRepositoryInterface;

final class GetAllFeedbackListAction
{
    private FeedbackRepositoryInterface $feedbackRepositoryInterface;

    public function __construct(FeedbackRepositoryInterface $feedbackRepositoryInterface)
    {
        $this->feedbackRepositoryInterface = $feedbackRepositoryInterface;
    }

    public function execute(): GetAllFeedbackListResponse
    {
        $getAllFeedbackList = $this->feedbackRepositoryInterface->getAllFeedbackList();

        return new GetAllFeedbackListResponse($getAllFeedbackList);
    }

}
