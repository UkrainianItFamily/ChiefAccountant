<?php


namespace App\Actions\Feedback;

use App\Models\Feedback;
use App\Repositories\Feedback\FeedbackRepositoryInterface;

final class AddFeedbackAction
{
    private FeedbackRepositoryInterface $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function execute(AddFeedbackRequest $request): AddFeedbackResponse
    {
        $feedback = new Feedback();
        $feedback->name = $request->getName();
        $feedback->email = $request->getEmail();
        $feedback->phone = $request->getPhone();
        $feedback->question_topic_id = $request->getQuestionTopicId();
        $feedback->description = $request->getDescription();

        $feedback = $this->feedbackRepository->createFeedback($feedback);

        return New AddFeedbackResponse($feedback);
    }

}
