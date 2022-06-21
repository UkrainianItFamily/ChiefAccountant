<?php

declare(strict_types=1);

namespace App\Repositories\ReportRedaction;

use App\Models\Report;
use App\Models\ReportRedaction;
use Illuminate\Database\Eloquent\Collection;

interface ReportRedactionRepositoryInterface
{
    public function saveReportRedaction(ReportRedaction $reportRedaction): ReportRedaction;

    public function updateReportRedaction(ReportRedaction $reportRedaction): ReportRedaction;

    public function getRedactionsCollectionByIds(array $idArray): Collection;

    public function getReportRedactionById(int $id): ReportRedaction;

    public function getRedactionsCollectionByReport(Report $report): Collection;
}
