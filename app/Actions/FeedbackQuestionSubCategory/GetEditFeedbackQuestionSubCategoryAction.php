<?php


namespace App\Actions\FeedbackQuestionSubCategory;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class GetEditFeedbackQuestionSubCategoryAction
{
    private FeedbackQuestionRepositoryInterface   $feedbackQuestionSubCategoryRepositoryInterface;

    public function __construct(FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface)
    {
        $this->feedbackQuestionSubCategoryRepositoryInterface = $feedbackQuestionRepositoryInterface;
    }

    public function execute(GetEditFeedbackQuestionSubCategoryRequest  $request):GetEditFeedbackQuestionSubCategoryResponse
    {
        $getFeedbackSubCategoryById =  $this->feedbackQuestionSubCategoryRepositoryInterface->getFeedbackCategoryById($request->getId());

        return new GetEditFeedbackQuestionSubCategoryResponse($getFeedbackSubCategoryById );
    }
}
