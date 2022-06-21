<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Models\ReportCategory;
use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;
use Illuminate\Support\Str;

final class AddReportCategoryAction
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function execute(AddReportCategoryRequest $request): AddReportCategoryResponse
    {
        $reportCategory = new ReportCategory();

        $reportCategory->name = $request->getName();
        $reportCategory->report_category_id = $request->getParentCategoryId();

        $reportCategory = $this->reportCategoryRepository->saveReportCategory($reportCategory);

        $reportCategory->slug = Str::slug($request->getName(), '-') . "-" . $reportCategory->id;

        $reportCategory = $this->reportCategoryRepository->updateReportCategory($reportCategory);

        return new AddReportCategoryResponse($reportCategory);
    }
}
