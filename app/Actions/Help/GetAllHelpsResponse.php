<?php

declare(strict_types=1);

namespace App\Actions\Help;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetAllHelpsResponse implements ActionsResponseCollectionInterface
{
    private Collection $helps;

    public function __construct(Collection $helps)
    {
        $this->helps = $helps;
    }

    public function getResponse(): Collection
    {
        return $this->helps;
    }
}
