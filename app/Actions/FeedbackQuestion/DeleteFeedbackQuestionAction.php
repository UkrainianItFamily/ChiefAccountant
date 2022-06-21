<?php


namespace App\Actions\FeedbackQuestion;

use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class DeleteFeedbackQuestionAction
{
  private FeedbackQuestionRepositoryInterface $feedbackQuestionRepositoryInterface;

  public function __construct(FeedbackQuestionRepositoryInterface $feedbackInfoRepository)
  {
      $this->feedbackQuestionRepositoryInterface = $feedbackInfoRepository;
  }

  public function execute(DeleteFeedbackQuestionRequest $request): void
  {
      $this->feedbackQuestionRepositoryInterface->deleteFeedbackCategory($request->getId());
  }
}
