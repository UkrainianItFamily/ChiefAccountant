<?php

declare(strict_types=1);

namespace App\Repositories\Report;

use App\Models\Report;
use App\Models\ReportCategory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ReportRepository extends BaseRepository implements ReportRepositoryInterface
{
    public function getReportsByCategory(string $categorySlug): Collection
    {
        $reports = ReportCategory::firstwhere('slug', $categorySlug)->reports;

        return $reports;
    }

    public function getReportBySlug(string $slug): ?Report
    {
        $report = Report::firstwhere('slug', $slug);

        return $report;
    }

    public function saveReport(Report $report): Report
    {
        $report->save();

        return $report;
    }

    public function updateReport(Report $report): Report
    {
        $report->update();

        return $report;
    }

    public function getAllReportsPaginate(int $perPage): LengthAwarePaginator
    {
        $reports = Report::orderBy('id', 'desc')->paginate($perPage);

        return $reports;
    }

    public function deleteReport(Report $report): void
    {
        $report->delete();
    }

    public function getReportById(int $id): ?Report
    {
        $report = Report::find($id);

        return $report;
    }

    public function syncReportWithRedactions(Report $report, Collection $reportRedactions): void
    {
        $report->redactions()->saveMany($reportRedactions);
    }

    public function getReportsByArrayId(array $idArray): Collection
    {
        $reports = Report::find($idArray);

        return $reports;
    }
}
