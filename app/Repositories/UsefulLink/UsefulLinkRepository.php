<?php

declare(strict_types=1);

namespace App\Repositories\UsefulLink;

use App\Models\UsefulLink;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UsefulLinkRepository extends BaseRepository implements UsefulLinkRepositoryInterface
{
    public function saveUsefulLink(UsefulLink $usefulLink): UsefulLink
    {
        $usefulLink->save();

        return $usefulLink;
    }

    public function getUsefulLinkById(int $id): ?UsefulLink
    {
        $usefulLink = UsefulLink::find($id);

        return $usefulLink;
    }

    public function deleteUsefulLink(UsefulLink $usefulLink): void
    {
        $usefulLink->delete();
    }

    public function updateUsefulLink(UsefulLink $usefulLink): UsefulLink
    {
        $usefulLink->update();

        return $usefulLink;
    }

    public function getUsefulLinksByPaginate(int $perPage): ?LengthAwarePaginator
    {
        $usefulLinks = UsefulLink::orderBy('created_at', 'desc')->paginate($perPage);

        return $usefulLinks;
    }

    public function getUsefulLinksByLimit(int $offset, int $limit): Collection
    {
        $usefulLinks = UsefulLink::orderBy('id', 'desc')->offset($offset)->limit($limit)->get();

        return $usefulLinks;
    }
}
