<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Actions\App\AddAppAction;
use App\Actions\ReportRedaction\AddReportRedactionAction;
use App\Actions\ReportRedaction\AddReportRedactionRequest;
use App\Models\Report;
use App\Repositories\App\AppRepositoryInterface;
use App\Repositories\Report\ReportRepositoryInterface;
use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;
use Illuminate\Support\Str;

final class AddReportAction
{
    private ReportRepositoryInterface $reportRepository;

    private ReportRedactionRepositoryInterface $reportRedactionRepository;

    private AddAppAction $addAppAction;

    private AppRepositoryInterface $appRepository;

    private AddReportRedactionAction $addReportRedactionAction;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
        ReportRedactionRepositoryInterface $reportRedactionRepository,
        AddAppAction $addAppAction,
        AppRepositoryInterface $appRepository,
        AddReportRedactionAction $addReportRedactionAction
    ) {
        $this->reportRepository = $reportRepository;
        $this->reportRedactionRepository = $reportRedactionRepository;
        $this->addAppAction = $addAppAction;
        $this->appRepository = $appRepository;
        $this->addReportRedactionAction = $addReportRedactionAction;
    }

    public function execute(AddReportRequest $request): AddReportResponse
    {
        $report = new Report();

        $report->title = $request->getTitle();
        $report->category_id = $request->getCategoryId();

        $report = $this->reportRepository->saveReport($report);

        $report->slug = Str::slug($request->getTitle(), '-').'-'.$report->getId();

        $mainReportRedaction = $this->addReportRedactionAction->execute(
            new AddReportRedactionRequest(
                $request->getDate(),
                $request->getTitle(),
                $request->getDescription(),
                $report->getId()
            )
        )->getResponse();


        if ($request->getRedactionsIdArray()) {
            $redactionsCollection = $this->reportRedactionRepository->getRedactionsCollectionByIds($request->getRedactionsIdArray());

            $this->reportRepository->syncReportWithRedactions($report, $redactionsCollection);
        }

        if ($request->getAppsIdArray()) {

            $app = $this->addAppAction->execute()->getResponse();

            $this->appRepository->syncAppWithReports($app, $request->getAppsIdArray());

            $report->app_id = $app->getId();
        }

        $report = $this->reportRepository->updateReport($report);

        return new AddReportResponse($report);
    }
}
