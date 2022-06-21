<?php

declare(strict_types=1);

namespace App\Actions\Tag;

use App\Contracts\ActionsResponseArrayInterface;

final class AddTagsResponse implements ActionsResponseArrayInterface
{
    private array $tagsIdArray;

    public function __construct(array $tagsIdArray)
    {
        $this->tagsIdArray = $tagsIdArray;
    }

    public function getResponse(): array
    {
        return $this->tagsIdArray;
    }
}
