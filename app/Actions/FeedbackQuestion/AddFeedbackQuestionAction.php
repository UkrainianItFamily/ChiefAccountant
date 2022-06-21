<?php

declare(strict_types=1);

namespace App\Actions\FeedbackQuestion;


use App\Models\FeedbackCategory;
use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class AddFeedbackQuestionAction
{
    private FeedbackQuestionRepositoryInterface $feedbackQuestionRepository;

    public function __construct(FeedbackQuestionRepositoryInterface $feedbackInfoRepository)
    {
        $this->feedbackQuestionRepository = $feedbackInfoRepository;
    }

    public function execute(AddFeedbackQuestionRequest $request): AddFeedbackQuestionResponse
    {
        $feedbackCategory = new FeedbackCategory();
        $feedbackCategory->title = $request->getTitle();

        $feedbackCategory = $this->feedbackQuestionRepository->createFeedbackCategory($feedbackCategory);

        return new AddFeedbackQuestionResponse($feedbackCategory);
    }
}
