<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\ReportRedaction;

final class AddReportRedactionResponse implements ActionsResponseModelInterface
{
    private ReportRedaction $reportRedaction;

    public function __construct(ReportRedaction $reportRedaction)
    {
        $this->reportRedaction = $reportRedaction;
    }

    public function getResponse(): ReportRedaction
    {
        return $this->reportRedaction;
    }
}
