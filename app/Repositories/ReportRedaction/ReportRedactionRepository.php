<?php

declare(strict_types=1);

namespace App\Repositories\ReportRedaction;

use App\Models\Report;
use App\Models\ReportRedaction;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class ReportRedactionRepository extends BaseRepository implements ReportRedactionRepositoryInterface
{
    public function saveReportRedaction(ReportRedaction $reportRedaction): ReportRedaction
    {
        $reportRedaction->save();

        return $reportRedaction;
    }

    public function updateReportRedaction(ReportRedaction $reportRedaction): ReportRedaction
    {
        $reportRedaction->update();

        return $reportRedaction;
    }

    public function getRedactionsCollectionByIds(array $idArray): Collection
    {
        $redactionsCollection = ReportRedaction::find($idArray);

        return $redactionsCollection;
    }

    public function getReportRedactionById(int $id): ReportRedaction
    {
        $reportRedaction = ReportRedaction::find($id);

        return $reportRedaction;
    }

    public function getRedactionsCollectionByReport(Report $report):Collection
    {
        $redactions = $report->redactions->sortByDesc('date');

        return $redactions;
    }
}
