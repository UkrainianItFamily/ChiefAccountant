<?php


namespace App\Actions\FeedbackInfo;

use App\Repositories\FeedbackInfo\FeedbackInfoRepositoryInterface;

final class DeleteFeedbackInfoAction
{
  private FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface;

  public function __construct(FeedbackInfoRepositoryInterface $feedbackInfoRepository)
  {
      $this->feedbackInfoRepositoryInterface = $feedbackInfoRepository;
  }

  public function execute(DeleteFeedbackInfoRequest $request): void
  {
      $this->feedbackInfoRepositoryInterface->deleteFeedbackInfo($request->getId());
  }
}
