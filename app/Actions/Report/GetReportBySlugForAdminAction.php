<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Actions\App\GetAllAppsByIdAction;
use App\Actions\App\GetAllAppsByIdRequest;
use App\Repositories\Report\ReportRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class GetReportBySlugForAdminAction
{
    private ReportRepositoryInterface $reportRepository;

    private GetAllAppsByIdAction $getAllAppsByIdAction;

    public function __construct(ReportRepositoryInterface $reportRepository, GetAllAppsByIdAction $getAllAppsByIdAction)
    {
        $this->reportRepository = $reportRepository;

        $this->getAllAppsByIdAction = $getAllAppsByIdAction;
    }

    public function execute(GetReportBySlugForAdminRequest $request): GetReportBySlugForAdminResponse
    {
        $report = $this->reportRepository->getReportBySlug($request->getSlug());

        if (!$report) {
            throw new ModelNotFoundException();
        }

        if ($report->app_id) {
            $report->apps = $this->getAllAppsByIdAction->execute(
                new GetAllAppsByIdRequest(
                    $report->getAppId()
                )
            )->getResponse();
        }

        return new GetReportBySlugForAdminResponse($report);
    }
}
