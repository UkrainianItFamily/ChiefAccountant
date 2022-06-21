<?php


namespace App\Actions\FeedbackQuestionSubCategory;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class DeleteFeedbackQuestionSubCategoryAction
{
  private FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface;

  public function __construct(FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface)
  {
      $this->feedbackQuestionRepositoryInterface = $feedbackQuestionRepositoryInterface;
  }

  public function execute(DeleteFeedbackQuestionSubCategoryRequest $request): void
  {
      $this->feedbackQuestionRepositoryInterface->deleteFeedbackCategory($request->getId());

  }
}
