<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;

final class GetAllReportCategoriesAction
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function execute(): GetAllReportCategoriesResponse
    {
        $categories = $this->reportCategoryRepository->getReportMainCategories();

        return new GetAllReportCategoriesResponse($categories);
    }
}
