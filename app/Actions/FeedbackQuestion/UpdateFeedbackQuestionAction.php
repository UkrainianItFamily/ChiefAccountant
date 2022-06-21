<?php


namespace App\Actions\FeedbackQuestion;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class UpdateFeedbackQuestionAction
{
    private FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface;

    public function __construct(FeedbackQuestionRepositoryInterface  $feedbackQuestionRepositoryInterface)
    {
        $this->feedbackQuestionRepositoryInterface =$feedbackQuestionRepositoryInterface;
    }

    public function execute(UpdateFeedbackQuestionRequest $request): UpdateFeedbackQuestionResponse
    {
        $updateFeedbackCategory = $this->feedbackQuestionRepositoryInterface->getFeedbackCategoryById($request->getId());
        $updateFeedbackCategory->title = $request->getTitle();

        $this->feedbackQuestionRepositoryInterface->updateFeedbackCategory($updateFeedbackCategory);

        return new UpdateFeedbackQuestionResponse($updateFeedbackCategory);
    }
}
