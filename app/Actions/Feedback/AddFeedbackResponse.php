<?php


namespace App\Actions\Feedback;

use App\Models\Feedback;

class AddFeedbackResponse
{
    private Feedback $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function getResponse(): Feedback
    {
        return $this->feedback;
    }
}
