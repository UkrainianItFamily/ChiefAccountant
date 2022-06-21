<?php


namespace App\Actions\FeedbackQuestionSubCategory;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;


final class UpdateFeedbackQuestionSubCategoryAction
{
    private FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface;

    public function __construct(FeedbackQuestionRepositoryInterface  $feedbackQuestionRepositoryInterface)
    {
        $this->feedbackQuestionRepositoryInterface = $feedbackQuestionRepositoryInterface;
    }

    public function execute(UpdateFeedbackQuestionSubCategoryRequest $request): UpdateFeedbackQuestionSubCategoryResponse
    {
        $updateFeedbackSubCategory = $this->feedbackQuestionRepositoryInterface->getFeedbackCategoryById($request->getId());
        $updateFeedbackSubCategory->title = $request->getTitle();

        $this->feedbackQuestionRepositoryInterface->updateFeedbackCategory($updateFeedbackSubCategory);

        return new UpdateFeedbackQuestionSubCategoryResponse($updateFeedbackSubCategory);
    }

}
