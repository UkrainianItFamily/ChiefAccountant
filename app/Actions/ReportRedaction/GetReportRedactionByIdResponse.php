<?php

declare(strict_types=1);

namespace App\Actions\ReportRedaction;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\ReportRedaction;

final class GetReportRedactionByIdResponse implements ActionsResponseModelInterface
{
    private ReportRedaction $ReportRedaction;

    public function __construct(ReportRedaction $ReportRedaction)
    {
        $this->ReportRedaction = $ReportRedaction;
    }

    public function getResponse(): ReportRedaction
    {
        return $this->ReportRedaction;
    }
}
