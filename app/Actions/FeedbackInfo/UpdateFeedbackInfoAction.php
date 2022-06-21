<?php


namespace App\Actions\FeedbackInfo;

use App\Repositories\FeedbackInfo\FeedbackInfoRepositoryInterface;

final class UpdateFeedbackInfoAction
{
    private FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface;

    public function __construct(FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface)
    {
        $this->feedbackInfoRepositoryInterface = $feedbackInfoRepositoryInterface;
    }

    public function execute(UpdateFeedbackInfoRequest $request): UpdateFeedbackInfoResponse
    {
        $updateFeedbackInfo = $this->feedbackInfoRepositoryInterface->getFeedbackInfoById($request->getFeedbackId());
        $updateFeedbackInfo->description = $request->getDescription();

        $this->feedbackInfoRepositoryInterface->updateFeedbackInfo($updateFeedbackInfo);

        return new UpdateFeedbackInfoResponse($updateFeedbackInfo);
    }

}
