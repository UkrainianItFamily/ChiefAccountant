<?php

declare(strict_types=1);

namespace App\Repositories\News;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface NewsRepositoryInterface
{
    public function saveNews(News $news): News;

    public function updateNews(News $news): News;

    public function syncNewsWithTags(News $news, array $tags): void;

    public function deleteTagsFromNews(News $news): void;

    public function getNewsById(int $id): ?News;

    public function getNewsBySlug(string $slug): ?News;

    public function getAllNews(): ?Collection;

    public function getAllNewsByTag(Tag $tag): ?Collection;

    public function deleteNews(News $news): void;

    public function getNewsByPaginate($perPage): ?LengthAwarePaginator;
}
