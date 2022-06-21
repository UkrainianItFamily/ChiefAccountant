<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetUsefulLinksByLimitResponse implements ActionsResponseCollectionInterface
{
    private Collection $usefulLinks;

    public function __construct(Collection $usefulLinks)
    {
        $this->usefulLinks = $usefulLinks;
    }

    public function getResponse(): Collection
    {
        return $this->usefulLinks;
    }
}
