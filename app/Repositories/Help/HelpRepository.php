<?php

declare(strict_types=1);

namespace App\Repositories\Help;

use App\Models\Help;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class HelpRepository extends BaseRepository implements HelpRepositoryInterface
{
    public function getAllHelps(): Collection
    {
        $helps = Help::all()->sortDesc();

        return $helps;
    }

    public function saveHelp(Help $help): Help
    {
        $help->save();

        return $help;
    }

    public function updateHelp(Help $help): Help
    {
        $help->update();

        return $help;
    }
}
