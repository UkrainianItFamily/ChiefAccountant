<?php


namespace App\Actions\Feedback;


use App\Repositories\Feedback\FeedbackRepositoryInterface;

class GetFeedbackAction
{
    private FeedbackRepositoryInterface $feedbackRepositoryInterface;

    public function __construct(FeedbackRepositoryInterface $feedbackRepositoryInterface)
    {
        $this->feedbackRepositoryInterface = $feedbackRepositoryInterface;
    }

    public function execute(): GetFeedbackResponse
    {
        $getFeedbackInfo = $this->feedbackRepositoryInterface->getFeedbackHomeInfo();

        return new GetFeedbackResponse($getFeedbackInfo);
    }
}
