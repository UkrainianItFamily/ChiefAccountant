<?php

declare(strict_types=1);

namespace App\Repositories\HelpCategory;

use App\Models\HelpCategory;
use Illuminate\Database\Eloquent\Collection;

interface HelpCategoryRepositoryInterface
{
    public function getAllHelpCategories(): Collection;

    public function saveHelpCategory(HelpCategory $helpCategory): HelpCategory;

    public function updateHelpCategory(HelpCategory $helpCategory): HelpCategory;

    public function getHelpCategoryById(int $id): ?HelpCategory;
}
