<?php

declare(strict_types=1);

namespace App\Repositories\HelpCategory;

use App\Models\HelpCategory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class HelpCategoryRepository extends BaseRepository implements HelpCategoryRepositoryInterface
{
    public function getAllHelpCategories(): Collection
    {
        $categories = HelpCategory::all();

        return $categories;
    }

    public function saveHelpCategory(HelpCategory $helpCategory): HelpCategory
    {
        $helpCategory->save();

        return $helpCategory;
    }

    public function updateHelpCategory(HelpCategory $helpCategory): HelpCategory
    {
        $helpCategory->update();

        return $helpCategory;
    }

    public function getHelpCategoryById(int $id): ?HelpCategory
    {
        $helpCategory = HelpCategory::find($id);

        return $helpCategory;
    }
}
