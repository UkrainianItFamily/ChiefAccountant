<?php


namespace App\Actions\Feedback;

use App\Repositories\Feedback\FeedbackRepositoryInterface;

class GetShowFeedbackByIdAction
{
    private FeedbackRepositoryInterface $feedbackRepositoryInterface;

    public function __construct(FeedbackRepositoryInterface $feedbackRepositoryInterface)
    {
        $this->feedbackRepositoryInterface = $feedbackRepositoryInterface;
    }

    public function execute(GetShowFeedbackByIdRequest $request):GetShowFeedbackByIdResponse
    {
        $showFeedbackById = $this->feedbackRepositoryInterface->showFeedbackById($request->getId());

        return new GetShowFeedbackByIdResponse($showFeedbackById);
    }
}
