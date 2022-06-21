<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface PresenterStringInterface
{
    public function presentString(Collection $collection): string;
}
