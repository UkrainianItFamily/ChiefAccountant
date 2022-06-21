<?php

namespace App\Actions\EntrepreneurialActivity;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetAllListEntrepreneurialActivityResponse  implements ActionsResponseCollectionInterface
{
    private Collection $entrepreneurialActivity;

    public function __construct(Collection $entrepreneurialActivity)
    {
        $this->entrepreneurialActivity = $entrepreneurialActivity;
    }

    public function getResponse(): Collection
    {
        return $this->entrepreneurialActivity;
    }
}
