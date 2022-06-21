<?php

declare(strict_types=1);

namespace App\Actions\Tag;

class AddTagsRequest
{
    private string $tags;

    public function __construct(string $tags)
    {
        $this->tags = $tags;
    }

    public function getTags(): string
    {
        return $this->tags;
    }
}
