<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Actions\App\AddAppAction;
use App\Repositories\App\AppRepositoryInterface;
use App\Repositories\Report\ReportRepositoryInterface;
use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;

final class UpdateReportAction
{
    private ReportRepositoryInterface $reportRepository;

    private AppRepositoryInterface $appRepository;

    private AddAppAction $addAppAction;

    private ReportRedactionRepositoryInterface $reportRedactionRepository;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
        AppRepositoryInterface $appRepository,
        AddAppAction $addAppAction,
        ReportRedactionRepositoryInterface $reportRedactionRepository
    ) {
        $this->reportRepository = $reportRepository;

        $this->appRepository = $appRepository;

        $this->addAppAction = $addAppAction;

        $this->reportRedactionRepository = $reportRedactionRepository;
    }

    public function execute(UpdateReportRequest $request): UpdateReportResponse
    {
        $updateReport = $this->reportRepository->getReportById($request->getId());

        $updateReport->slug = $request->getSlug();
        $updateReport->title = $request->getTitle();
        $updateReport->category_id = $request->getCategory();

        if ($request->getAppsIdArray()) {
            if ($updateReport->getAppId()) {
                $app = $this->appRepository->getAppById($updateReport->getAppId());
            } else {
                $app = $this->addAppAction->execute()->getResponse();
                $updateReport->app_id = $app->id;
            }

            $this->appRepository->syncAppWithReports($app, $request->getAppsIdArray());
        } else {
            $updateReport->app_id = null;
        }

        $existingRedactionsCollection = $updateReport->redactions;

        if ($request->getDeleteRedactionsIdArray()) {
            foreach ($existingRedactionsCollection as $redaction) {
                foreach ($request->getDeleteRedactionsIdArray() as $toDeleteRedactionId) {
                    if ($redaction->id == $toDeleteRedactionId) {
                        $redaction->delete();
                    }
                }
            }
        }

        if ($request->getRedactionsIdArray()) {
            $redactionsCollection = $this->reportRedactionRepository->getRedactionsCollectionByIds($request->getRedactionsIdArray());

            $this->reportRepository->syncReportWithRedactions($updateReport, $redactionsCollection);
        }

        $this->reportRepository->updateReport($updateReport);

        return new UpdateReportResponse($updateReport);
    }
}
