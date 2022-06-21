<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\ReportCategory;

final class UpdateReportCategoryResponse implements ActionsResponseModelInterface
{
    private ReportCategory $reportCategory;

    public function __construct(ReportCategory $reportCategory)
    {
        $this->reportCategory = $reportCategory;
    }

    public function getResponse(): ReportCategory
    {
        return $this->reportCategory;
    }
}
