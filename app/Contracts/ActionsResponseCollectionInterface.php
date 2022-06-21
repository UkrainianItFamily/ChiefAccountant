<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ActionsResponseCollectionInterface
{
    public function getResponse(): Collection;
}
