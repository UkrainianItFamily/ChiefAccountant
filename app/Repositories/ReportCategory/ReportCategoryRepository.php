<?php

declare(strict_types=1);

namespace App\Repositories\ReportCategory;

use App\Constant\ReportCategoryConstant;
use App\Models\ReportCategory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class ReportCategoryRepository extends BaseRepository implements ReportCategoryRepositoryInterface
{
    public function getReportMainCategories(): Collection
    {
        $categories = ReportCategory::where('report_category_id', ReportCategoryConstant::ZERO_CATEGORY_ID)->with('childrenCategories')->get();

        return $categories;
    }

    public function getSubCategories(string $slug): Collection
    {
        $subCategories = ReportCategory::firstwhere('slug', $slug)->childrenCategories;

        return $subCategories;
    }

    public function saveReportCategory(ReportCategory $reportCategory): ReportCategory
    {
       $reportCategory->save();

        return $reportCategory;
    }

    public function updateReportCategory(ReportCategory $reportCategory): ReportCategory
    {
        $reportCategory->update();

        return $reportCategory;
    }

    public function getCategoryById(int $id): ?ReportCategory
    {
        $category = ReportCategory::find($id);

        return $category;
    }

    public function deleteReportCategory(ReportCategory $category): void
    {
        $category->delete();
    }
}
