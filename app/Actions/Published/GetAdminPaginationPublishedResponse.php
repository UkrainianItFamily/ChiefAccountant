<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetAdminPaginationPublishedResponse implements ActionsResponseCollectionInterface
{
    private Collection $publishes;

    public function __construct(Collection $publishes)
    {
        $this->publishes = $publishes;
    }

    public function getResponse(): Collection
    {
        return $this->publishes;
    }
}
