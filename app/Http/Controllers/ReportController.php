<?php

namespace App\Http\Controllers;

use App\Actions\Report\GetReportsListAction;
use App\Actions\Report\GetReportsListRequest;
use App\Actions\ReportCategory\GetAllReportCategoriesAction;
use App\Actions\Report\GetReportBySlugAction;
use App\Actions\Report\GetReportBySlugRequest;
use App\Actions\ReportCategory\GetReportSubCategoriesAction;
use App\Actions\ReportCategory\GetReportSubCategoriesRequest;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReportListPage(GetAllReportCategoriesAction $action)
    {
        $categories = $action->execute()->getResponse();

        return view('pages.report.reporting-list-page', ['categories' => $categories]);
    }

    public function getSubcategories(GetReportsListAction $reportsListAction, GetReportSubCategoriesAction $subCategoriesAction, string $slug)
    {
        $sublist['reportsList'] = $reportsListAction->execute(
            new GetReportsListRequest(
                $slug
            )
        )->getResponse();

        $sublist['categoriesList'] = $subCategoriesAction->execute(
            new GetReportSubCategoriesRequest(
                $slug
            )
        )->getResponse();

        return response()->json($sublist);
    }

    public function getReportBySlug(GetReportBySlugAction $action, Request $request)
    {
        $report = $action->execute(
            new GetReportBySlugRequest(
                $request->slug,
                $request->redactionDate)
        )->getResponse();

        return response()->json($report);
    }

    public function getCreateReportPage(GetAllReportCategoriesAction $action)
    {
        $reportCategories = $action->execute()->getResponse();

        return view('pages.admin.report.report-create-page', ['categories' => $reportCategories]);
    }
}
