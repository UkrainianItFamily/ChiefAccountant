<?php

declare(strict_types=1);

namespace App\Repositories\Help;

use App\Models\Help;
use Illuminate\Database\Eloquent\Collection;

interface HelpRepositoryInterface
{
    public function getAllHelps(): Collection;

    public function saveHelp(Help $help): Help;

    public function updateHelp(Help $help): Help;
}
