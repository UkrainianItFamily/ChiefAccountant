<?php


namespace App\Actions\FeedbackQuestion;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

class GetParentsCategoryByIdAction
{
    private FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface;

    public function __construct(FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface)
    {
        $this->feedbackQuestionRepositoryInterface = $feedbackQuestionRepositoryInterface;
    }

    public function execute(): GetParentsCategoryByIdResponse
    {
        $getParentsCategoryById = $this->feedbackQuestionRepositoryInterface->getParentsFeedbackCategoryById();

        return new GetParentsCategoryByIdResponse($getParentsCategoryById);
    }
}
