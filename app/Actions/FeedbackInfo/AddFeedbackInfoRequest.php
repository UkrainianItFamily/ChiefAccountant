<?php

declare(strict_types=1);

namespace App\Actions\FeedbackInfo;

class AddFeedbackInfoRequest
{
    private string $description;

    public function __construct(
        string $description
    ) {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
