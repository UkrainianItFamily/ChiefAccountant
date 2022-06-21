<?php

declare(strict_types=1);

namespace App\Repositories\Published;

use App\Models\Published;
use Illuminate\Database\Eloquent\Collection;

interface PublishedRepositoryInterface
{
    public function getPaginationPublishes(int $offset, int $limit): Collection;

    public function getPublishedById(int $id): ?Published;

    public function deletePublished(Published $published): void;

    public function updatePublication(Published $publication): Published;

    public function savePublication(Published $publication): Published;
}
