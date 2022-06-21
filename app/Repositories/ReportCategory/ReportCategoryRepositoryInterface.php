<?php

declare(strict_types=1);

namespace App\Repositories\ReportCategory;

use App\Models\ReportCategory;
use Illuminate\Database\Eloquent\Collection;

interface ReportCategoryRepositoryInterface
{
    public function getReportMainCategories(): Collection;

    public function getSubCategories(string $slug): Collection;

    public function saveReportCategory(ReportCategory $reportCategory): ReportCategory;

    public function updateReportCategory(ReportCategory $reportCategory): ReportCategory;

    public function getCategoryById(int $id): ?ReportCategory;
  
    public function deleteReportCategory(ReportCategory $category): void;
}
