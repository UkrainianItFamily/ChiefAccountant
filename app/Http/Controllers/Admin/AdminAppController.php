<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Report\GetAllReportsWithPaginateAction;
use App\Actions\Report\GetAllReportsWithPaginateRequest;
use App\Constant\ReportConstant;
use App\Http\Controllers\Controller;

class AdminAppController extends Controller
{
    public function getAppsList(GetAllReportsWithPaginateAction $action)
    {
        $appsList = $action->execute(
            new GetAllReportsWithPaginateRequest(
                ReportConstant::ADMIN_MODAL_WINDOW_PER_PAGE
            )
        )->getResponse();

        return response()->json($appsList);
    }
}
