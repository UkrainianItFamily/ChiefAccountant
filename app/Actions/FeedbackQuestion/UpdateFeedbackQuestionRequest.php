<?php


namespace App\Actions\FeedbackQuestion;


class UpdateFeedbackQuestionRequest
{
    private int $id;
    private string $title;

    public function __construct(
        int $id,
        string $title
    ) {
        $this->id = $id;
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
