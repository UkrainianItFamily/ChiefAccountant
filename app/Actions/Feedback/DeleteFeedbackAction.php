<?php


namespace App\Actions\Feedback;

use App\Repositories\Feedback\FeedbackRepositoryInterface;

final class DeleteFeedbackAction
{
    private FeedbackRepositoryInterface $feedbackRepositoryInterface;

    public function __construct(FeedbackRepositoryInterface $feedbackRepositoryInterface)
    {
        $this->feedbackRepositoryInterface = $feedbackRepositoryInterface;
    }

    public function execute(DeleteFeedbackRequest $request): void
    {
        $this->feedbackRepositoryInterface->deleteFeedback($request->getId());
    }
}
