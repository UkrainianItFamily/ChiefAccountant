<?php

declare(strict_types=1);

namespace App\Repositories\Report;

use App\Models\Report;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ReportRepositoryInterface
{
    public function getReportsByCategory(string $categorySlug): Collection;

    public function getReportBySlug(string $slug): ?Report;

    public function saveReport(Report $report): Report;

    public function updateReport(Report $report): Report;

    public function getAllReportsPaginate(int $perPage): LengthAwarePaginator;

    public function deleteReport(Report $report): void;

    public function getReportById(int $id): ?Report;

    public function syncReportWithRedactions(Report $report, Collection $reportRedactions): void;

    public function getReportsByArrayId(array $idArray): Collection;
}
