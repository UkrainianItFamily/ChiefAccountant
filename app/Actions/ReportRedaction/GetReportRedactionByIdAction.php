<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;

final class GetReportRedactionByIdAction
{
    private ReportRedactionRepositoryInterface $reportRedactionRepository;

    public function __construct(ReportRedactionRepositoryInterface $reportRedactionRepository)
    {
        $this->reportRedactionRepository = $reportRedactionRepository;
    }

    public function execute(GetReportRedactionByIdRequest $request): GetReportRedactionByIdResponse
    {
        $reportRedaction = $this->reportRedactionRepository->getReportRedactionById($request->getId());

        return new GetReportRedactionByIdResponse($reportRedaction);
    }
}
