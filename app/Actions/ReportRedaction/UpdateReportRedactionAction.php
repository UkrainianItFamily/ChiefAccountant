<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;

final class UpdateReportRedactionAction
{
    private ReportRedactionRepositoryInterface $reportRedactionRepository;

    public function __construct(ReportRedactionRepositoryInterface $reportRedactionRepository)
    {
        $this->reportRedactionRepository = $reportRedactionRepository;
    }

    public function execute(UpdateReportRedactionRequest $request): UpdateReportRedactionResponse
    {
        $reportRedaction = $this->reportRedactionRepository->getReportRedactionById($request->getId());

        $reportRedaction->date = $request->getDate();
        $reportRedaction->title = $request->getTitle();
        $reportRedaction->description = $request->getDescription();

        $reportRedaction = $this->reportRedactionRepository->updateReportRedaction($reportRedaction);

        return new UpdateReportRedactionResponse($reportRedaction);
    }
}
