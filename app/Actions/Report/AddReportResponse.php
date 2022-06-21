<?php

declare(strict_types=1);

namespace App\Actions\Report;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Report;

final class AddReportResponse implements ActionsResponseModelInterface
{
    private Report $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function getResponse(): Report
    {
        return $this->report;
    }
}
