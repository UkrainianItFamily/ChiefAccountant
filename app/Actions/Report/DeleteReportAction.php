<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Repositories\Report\ReportRepositoryInterface;

final class DeleteReportAction
{
    private ReportRepositoryInterface $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function execute(DeleteReportRequest $request): void
    {
        $report = $this->reportRepository->getReportById($request->getId());

        $this->reportRepository->deleteReport($report);
    }
}
