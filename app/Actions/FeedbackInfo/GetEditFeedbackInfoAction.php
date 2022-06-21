<?php


namespace App\Actions\FeedbackInfo;

use App\Repositories\FeedbackInfo\FeedbackInfoRepositoryInterface;

final class GetEditFeedbackInfoAction
{
    private FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface;

    public function __construct(FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface)
    {
        $this->feedbackInfoRepositoryInterface = $feedbackInfoRepositoryInterface;
    }

    public function execute(GetEditFeedbackInfoRequest $request)
    {
        $getEditFeedbackInfo = $this->feedbackInfoRepositoryInterface->getFeedbackInfoById($request->getId());

        return new GetEditFeedbackInfoResponse($getEditFeedbackInfo);
    }
}
