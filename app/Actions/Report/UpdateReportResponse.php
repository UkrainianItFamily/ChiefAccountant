<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Report;

final class UpdateReportResponse implements ActionsResponseModelInterface
{
    private Report $updatedReport;

    public function __construct(Report $newReport)
    {
        $this->updatedReport = $newReport;
    }

    public function getResponse(): Report
    {
        return $this->updatedReport;
    }
}
