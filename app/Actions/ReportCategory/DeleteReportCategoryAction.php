<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;

final class DeleteReportCategoryAction
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function execute(DeleteReportCategoryRequest $request): void
    {
        $category = $this->reportCategoryRepository->getCategoryById($request->getId());

        $this->reportCategoryRepository->deleteReportCategory($category);
    }
}
