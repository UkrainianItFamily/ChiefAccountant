<?php

declare(strict_types=1);

namespace App\Repositories\UsefulLink;

use App\Models\UsefulLink;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UsefulLinkRepositoryInterface
{
    public function saveUsefulLink(UsefulLink $usefulLink): UsefulLink;

    public function getUsefulLinkById(int $id): ?UsefulLink;

    public function deleteUsefulLink(UsefulLink $usefulLink): void;

    public function updateUsefulLink(UsefulLink $usefulLink): UsefulLink;

    public function getUsefulLinksByPaginate(int $perPage): ?LengthAwarePaginator;

    public function getUsefulLinksByLimit(int $offset, int $limit): Collection;
}
