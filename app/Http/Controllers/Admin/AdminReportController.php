<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Report\AddReportAction;
use App\Actions\Report\AddReportRequest;
use App\Actions\Report\DeleteReportAction;
use App\Actions\Report\DeleteReportRequest;
use App\Actions\Report\GetAllReportsWithPaginateAction;
use App\Actions\Report\GetAllReportsWithPaginateRequest;
use App\Actions\Report\GetReportBySlugForAdminAction;
use App\Actions\Report\GetReportBySlugForAdminRequest;
use App\Actions\Report\UpdateReportAction;
use App\Actions\Report\UpdateReportRequest;
use App\Actions\ReportCategory\GetAllReportCategoriesAction;
use App\Constant\ReportConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function getCreateReportPage(GetAllReportCategoriesAction $action)
    {
        $categories = $action->execute()->getResponse();

        return view('pages.admin.report.report-create-page', ['categories' => $categories]);
    }

    public function createReport(AddReportAction $action, Request $request)
    {
        $report = $action->execute(
            new AddReportRequest(
                $request->input('title'),
                (int) $request->input('categoryId'),
                $request->input('description'),
                $request->input('date'),
                (array) $request->input('redactionsIdArray'),
                (array) $request->input('appsIdArray'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно создано', 'admin.getAllReports');
    }

    public function getAllReports(GetAllReportsWithPaginateAction $action)
    {
        $reports = $action->execute(
            new GetAllReportsWithPaginateRequest(
                ReportConstant::ADMIN_PER_PAGE
            )
        )->getResponse();

        return view('pages.admin.report.reports-all-list-page', ['data'=> $reports]);
    }

    public function deleteReport(DeleteReportAction $action, string $id)
    {
        $action->execute(
            new DeleteReportRequest(
                (int)$id
            )
        );

        return back()
            ->with(['success' => 'Успешно удалено']);
    }

    public function updateReport(UpdateReportAction $action, Request $request)
    {
        $report = $action->execute(
            new UpdateReportRequest(
                (int) $request->input('id'),
                $request->input('slug'),
                $request->input('title'),
                (int) $request->input('categoryId'),
                (array) $request->input('appsIdArray'),
                (array) $request->input('redactionsIdArray'),
                (array) $request->input('deleteRedactionsIdArray'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Сохранено', 'admin.getEditReportPage', $report->getSlug());
    }

    public function getEditReportPage(GetReportBySlugForAdminAction $getReportBySlugForAdminAction, GetAllReportCategoriesAction $allReportCategoriesAction, Request $request)
    {
        $report = $getReportBySlugForAdminAction->execute(
            new GetReportBySlugForAdminRequest(
                $request->slug
            )
        )->getResponse();

        $categories = $allReportCategoriesAction->execute()->getResponse();

        return view('pages.admin.report.report-update-page', ['report' => $report, 'categories' => $categories]);
    }
}
