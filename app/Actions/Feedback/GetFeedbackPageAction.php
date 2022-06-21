<?php


namespace App\Actions\Feedback;

use App\Repositories\Feedback\FeedbackRepositoryInterface;

final class GetFeedbackPageAction
{
    private FeedbackRepositoryInterface $feedbackRepositoryInterface;

    public function __construct(FeedbackRepositoryInterface $feedbackRepositoryInterface)
    {
        $this->feedbackRepositoryInterface = $feedbackRepositoryInterface;
    }

    public function execute(): GetFeedbackPageResponse
    {
        $getFeedbackPage = $this->feedbackRepositoryInterface->getFeedbackPage();

        return new GetFeedbackPageResponse($getFeedbackPage);
    }
}
