<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

use App\Models\ReportRedaction;
use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;

final class AddReportRedactionAction
{
    private ReportRedactionRepositoryInterface $reportRedactionRepository;

    public function __construct(ReportRedactionRepositoryInterface $reportRedactionRepository)
    {
        $this->reportRedactionRepository = $reportRedactionRepository;
    }

    public function execute(AddReportRedactionRequest $request): AddReportRedactionResponse
    {
        $reportRedaction = new ReportRedaction();

        $reportRedaction->date = $request->getDate();
        $reportRedaction->title = $request->getTitle();
        $reportRedaction->description = $request->getDescription();
        $reportRedaction->report_id = $request->getReportId();

        $reportRedaction = $this->reportRedactionRepository->saveReportRedaction($reportRedaction);

        return new AddReportRedactionResponse($reportRedaction);
    }
}
