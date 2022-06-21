<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;

final class GetReportSubCategoriesAction
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function execute(GetReportSubCategoriesRequest $request): GetAllReportCategoriesResponse
    {
        $subCategories = $this->reportCategoryRepository->getSubCategories($request->getMainCategorySlug());

        return new GetAllReportCategoriesResponse($subCategories);
    }
}
