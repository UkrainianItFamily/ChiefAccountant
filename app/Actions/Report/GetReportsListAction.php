<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Repositories\Report\ReportRepositoryInterface;

final class GetReportsListAction
{
    private ReportRepositoryInterface $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function execute(GetReportsListRequest $request): GetReportsListResponse
    {
        $reports = $this->reportRepository->getReportsByCategory($request->getCategorySlug());

        return new GetReportsListResponse($reports);
    }
}
