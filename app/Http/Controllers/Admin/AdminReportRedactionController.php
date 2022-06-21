<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ReportRedaction\AddReportRedactionAction;
use App\Actions\ReportRedaction\AddReportRedactionRequest;
use App\Actions\ReportRedaction\GetReportRedactionByIdAction;
use App\Actions\ReportRedaction\GetReportRedactionByIdRequest;
use App\Actions\ReportRedaction\UpdateReportRedactionAction;
use App\Actions\ReportRedaction\UpdateReportRedactionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReportRedactionController extends Controller
{
    public function saveReportRedaction(AddReportRedactionAction $action, Request $request)
    {
        $redaction = $action->execute(
            new AddReportRedactionRequest(
                $request->date,
                $request->title,
                $request->description
            )
        )->getResponse();

        return response()->json($redaction);
    }

    public function getReportRedactionById(GetReportRedactionByIdAction $action, string $id)
    {
        $reportRedaction = $action->execute(
            new GetReportRedactionByIdRequest(
                (int) $id
            )
        )->getResponse();

        return response()->json($reportRedaction);
    }

    public function updateReportRedaction(UpdateReportRedactionAction $action, Request $request)
    {
        $redaction = $action->execute(
            new UpdateReportRedactionRequest(
                (int) $request->id,
                $request->date,
                $request->title,
                $request->description
            )
        )->getResponse();

        return response()->json($redaction);
    }
}
