<?php

declare(strict_types=1);

namespace App\Actions\ReportCategory;

use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;

final class GetReportCategoryByIdAction
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function execute(GetReportCategoryByIdRequest $request): GetReportCategoryByIdResponse
    {
        $category = $this->reportCategoryRepository->getCategoryById($request->getCategoryId());

        return new GetReportCategoryByIdResponse($category);
    }
}
