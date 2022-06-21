<?php


namespace App\Actions\Feedback;

class AddFeedbackRequest
{
    private string $name;
    private string $email;
    private string $phone;
    private int $questionTopicId;
    private string $description;

    public function __construct(
        string $name,
        string $email,
        string $phone,
        int $questionTopicId,
        string $description
    ) {
        $this->name = $name;
        $this->email =$email;
        $this->phone =$phone;
        $this->questionTopicId = $questionTopicId;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getQuestionTopicId(): int
    {
        return $this->questionTopicId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
