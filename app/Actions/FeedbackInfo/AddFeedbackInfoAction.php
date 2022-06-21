<?php

declare(strict_types=1);

namespace App\Actions\FeedbackInfo;

use App\Models\FeedbackInfo;
use App\Repositories\FeedbackInfo\FeedbackInfoRepositoryInterface;

final class AddFeedbackInfoAction
{
    private FeedbackInfoRepositoryInterface $feedbackInfoRepository;

    public function __construct(FeedbackInfoRepositoryInterface $feedbackInfoRepository)
    {
        $this->feedbackInfoRepository = $feedbackInfoRepository;
    }

    public function execute(AddFeedbackInfoRequest $request): AddFeedbackInfoResponse
    {
        $feedbackInfo = new FeedbackInfo();
        $feedbackInfo->description = $request->getDescription();

        $feedbackInfo = $this->feedbackInfoRepository->createFeedbackInfo($feedbackInfo);

        return new AddFeedbackInfoResponse($feedbackInfo);
    }
}
