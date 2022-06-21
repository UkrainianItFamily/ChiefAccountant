<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Repositories\App\AppRepositoryInterface;
use App\Repositories\Report\ReportRepositoryInterface;
use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;
use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class GetReportBySlugAction
{
    private ReportRepositoryInterface $reportRepository;
    private ReportRedactionRepositoryInterface $reportRedactionRepository;
    private ReportCategoryRepositoryInterface $reportCategoryRepository;
    private AppRepositoryInterface $appRepository;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
        ReportRedactionRepositoryInterface $reportRedactionRepository,
        ReportCategoryRepositoryInterface $reportCategoryRepository,
        AppRepositoryInterface $appRepository
    ){
        $this->reportRepository = $reportRepository;
        $this->reportRedactionRepository = $reportRedactionRepository;
        $this->reportCategoryRepository = $reportCategoryRepository;
        $this->reportCategoryRepository = $reportCategoryRepository;
        $this->appRepository = $appRepository;
    }

    public function execute(GetReportBySlugRequest $request): GetReportBySlugResponse
    {
        $report = $this->reportRepository->getReportBySlug($request->getSlug());

        if (!$report) {
            throw new ModelNotFoundException();
        }

        $report->redactionsCollection = $this->reportRedactionRepository->getRedactionsCollectionByReport($report);

        if($request->getRedactionDate()) {
            $mainRedaction = $report->redactionsCollection->firstWhere('date', $request->getRedactionDate());
        } else {
            $mainRedaction = $report->redactionsCollection->first();

            $reportCategory = $this->reportCategoryRepository->getCategoryById($report->getCategoryId());
            $categoriesSlugArray[] = $reportCategory->getSlug();

            if($reportCategory->getParrentId()) {
                $parrentCategoryId = $reportCategory->getParrentId();

                do{
                    $parrentCategory = $this->reportCategoryRepository->getCategoryById($parrentCategoryId);
                    $parrentCategoryId = $parrentCategory->getParrentId();
                    array_unshift($categoriesSlugArray, $parrentCategory->getSlug());
                }while($parrentCategory->getParrentId());

                $reportUrl = '';

                for($i = 0; $i < count($categoriesSlugArray); $i++) {
                    $reportUrl = $reportUrl.'/'.$categoriesSlugArray[$i];
                }

                $report->url = $reportUrl.'/'.$report->getSlug();
            }
        }

        $report->date = $mainRedaction->getDate();
        $report->title = $mainRedaction->getTitle();
        $report->description = $mainRedaction->getDescription();

        if($report->getAppId()) {
            $app = $this->appRepository->getAppById($report->getAppId());
            $report->appsCollection = $this->appRepository->getReportsByApp($app);
        }

        return new GetReportBySlugResponse($report);
    }
}
