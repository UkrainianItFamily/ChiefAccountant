<?php


namespace App\Actions\FeedbackQuestion;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

class GetShowFeedbackQuestionByIdAction
{
    private FeedbackQuestionRepositoryInterface  $feedbackQuestionRepositoryInterface;

    public function __construct(FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface)
    {
        $this->feedbackQuestionRepositoryInterface = $feedbackQuestionRepositoryInterface;
    }

    public function execute(GetShowFeedbackQuestionByIdRequest $request):GetShowFeedbackQuestionByIdResponse
    {
        $showFeedbackCategoryById = $this->feedbackQuestionRepositoryInterface->showFeedbackCategoryById($request->getId());

        return new GetShowFeedbackQuestionByIdResponse($showFeedbackCategoryById);
    }
}
