<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Repositories\Report\ReportRepositoryInterface;

final class GetAllReportsWithPaginateAction
{
    private ReportRepositoryInterface $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function execute(GetAllReportsWithPaginateRequest $request): GetAllReportsWithPaginateResponse
    {
        $reports = $this->reportRepository->getAllReportsPaginate($request->getPerPage());

        return new GetAllReportsWithPaginateResponse($reports);
    }
}
