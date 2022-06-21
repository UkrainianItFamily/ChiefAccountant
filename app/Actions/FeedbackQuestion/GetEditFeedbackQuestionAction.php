<?php


namespace App\Actions\FeedbackQuestion;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class GetEditFeedbackQuestionAction
{
    private FeedbackQuestionRepositoryInterface  $feedbackQuestionRepositoryInterface;

    public function __construct(FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface)
    {
        $this->feedbackQuestionRepositoryInterface = $feedbackQuestionRepositoryInterface;
    }

    public function execute(GetEditFeedbackQuestionRequest  $request):GetEditFeedbackQuestionResponse
    {
        $getFeedbackCategoryById =  $this->feedbackQuestionRepositoryInterface->getFeedbackCategoryById($request->getId());

        return new GetEditFeedbackQuestionResponse($getFeedbackCategoryById);
    }
}
