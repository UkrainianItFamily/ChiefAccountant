<?php


namespace App\Actions\FeedbackInfo;

use App\Repositories\FeedbackInfo\FeedbackInfoRepositoryInterface;

final class GetAllFeedbackInfoListAction
{
    private FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface;

    public function __construct(FeedbackInfoRepositoryInterface $feedbackInfoRepositoryInterface)
    {
        $this->feedbackInfoRepositoryInterface = $feedbackInfoRepositoryInterface;
    }

    public function execute(): GetAllFeedbackInfoListResponse
    {
        $getAllFeedbackInfoList = $this->feedbackInfoRepositoryInterface->getAllFeedbackList();

        return new GetAllFeedbackInfoListResponse($getAllFeedbackInfoList);
    }
}
