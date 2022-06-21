<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetPublicationsByLimitResponse implements ActionsResponseCollectionInterface
{
    private Collection $publications;

    public function __construct(Collection $publications)
    {
        $this->publications = $publications;
    }

    public function getResponse(): Collection
    {
        return $this->publications;
    }
}
