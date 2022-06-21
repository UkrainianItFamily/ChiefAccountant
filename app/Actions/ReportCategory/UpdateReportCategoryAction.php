<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;
use Illuminate\Support\Str;

final class UpdateReportCategoryAction
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function execute(UpdateReportCategoryRequest $request): UpdateReportCategoryResponse
    {
        $reportCategory = $this->reportCategoryRepository->getCategoryById($request->getId());

        $reportCategory->name = $request->getName();
        $reportCategory->slug = Str::slug($request->getSlug());
        $reportCategory->report_category_id = $request->getParentCategoryId();

        $reportCategory = $this->reportCategoryRepository->updateReportCategory($reportCategory);

        return new UpdateReportCategoryResponse($reportCategory);
    }
}
