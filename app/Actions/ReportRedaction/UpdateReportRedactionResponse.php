<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\ReportRedaction;

final class UpdateReportRedactionResponse implements ActionsResponseModelInterface
{
    private ReportRedaction $updatedReportRedaction;

    public function __construct(ReportRedaction $updatedReportRedaction)
    {
        $this->updatedReportRedaction = $updatedReportRedaction;
    }

    public function getResponse(): ReportRedaction
    {
        return $this->updatedReportRedaction;
    }
}
