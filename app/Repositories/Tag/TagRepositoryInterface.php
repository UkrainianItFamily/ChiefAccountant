<?php

declare(strict_types=1);

namespace App\Repositories\Tag;

use App\Models\Tag;

interface TagRepositoryInterface
{
    public function addTag(string $tagName, string $tagSlug): Tag;

    public function getBySlug(string $tagSlug): ?Tag;
}
