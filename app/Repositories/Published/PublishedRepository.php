<?php

declare(strict_types=1);

namespace App\Repositories\Published;

use App\Constant\PublishedConstant;
use App\Models\Published;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PublishedRepository extends BaseRepository implements PublishedRepositoryInterface
{
    public function getPaginationPublishes(int $offset, int $limit = PublishedConstant::PER_PAGE): Collection
    {
        $publishes = Published::orderBy('date', 'desc')->offset($offset)->limit($limit)->get()->groupBy('date');

        return $publishes;
    }

    public function getPublishedById(int $id): ?Published
    {
        $published = Published::find($id);

        return $published;
    }

    public function deletePublished(Published $published): void
    {
        $published->delete();
    }

    public function updatePublication(Published $publication): Published
    {
        $publication->update();

        return $publication;
    }

    public function savePublication(Published $publication): Published
    {
        $publication->save();

        return $publication;
    }
}
