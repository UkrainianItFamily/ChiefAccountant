<?php

declare(strict_types=1);

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function addTag(string $tagName, string $tagSlug): Tag
    {
        $tag = Tag::firstOrCreate(['name' => $tagName], ['slug' => $tagSlug]);

        return $tag;
    }

    public function getAll(): Tag
    {
        return Tag::all();
    }

    public function getBySlug(string $tagSLug): ?Tag
    {
        return Tag::firstwhere('slug', '=', $tagSLug);
    }
}
