<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ReportCategory\AddReportCategoryAction;
use App\Actions\ReportCategory\AddReportCategoryRequest;
use App\Actions\ReportCategory\DeleteReportCategoryAction;
use App\Actions\ReportCategory\DeleteReportCategoryRequest;
use App\Actions\ReportCategory\GetAllReportCategoriesAction;
use App\Actions\ReportCategory\GetReportCategoryByIdAction;
use App\Actions\ReportCategory\GetReportCategoryByIdRequest;
use App\Actions\ReportCategory\UpdateReportCategoryAction;
use App\Actions\ReportCategory\UpdateReportCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportCategory\CreateReportCategoryValidateRequest;
use App\Http\Requests\ReportCategory\UpdateReportCategoryValidateRequest;
use Illuminate\Http\Request;

class AdminReportCategoryController extends Controller
{
    public function getCreateReportCategoryPage(GetAllReportCategoriesAction $action)
    {
        $categories = $action->execute()->getResponse();

        return view('pages.admin.report.report-categories-list-page', ['categories' => $categories]);
    }

    public function createReportCategory(AddReportCategoryAction $action, CreateReportCategoryValidateRequest $request)
    {
        $reportCategory = $action->execute(
            new AddReportCategoryRequest(
                $request->input('name'),
                (int) $request->input('parentCategoryId')
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно создано', 'admin.getAllReportsCategory');
    }

    public function deleteReportCategory(DeleteReportCategoryAction $action, string $id)
    {
        $action->execute(
            new DeleteReportCategoryRequest(
                (int) $id
            )
        );

        return back()
            ->with(['success' => 'Успешно удалено']);
    }

    public function updateReportCategory (UpdateReportCategoryAction $action, UpdateReportCategoryValidateRequest $request)
    {
        $category = $action->execute(
            new UpdateReportCategoryRequest(
                (int) $request->input('id'),
                $request->input('slug'),
                $request->input('name'),
                (int) $request->input('parentCategoryId'),
            )
        )->getResponse();

        return back()
            ->with(['success'=> 'Успешно сохранено']);
    }

    public function getReportCategoryById(GetReportCategoryByIdAction $action, Request $request)
    {
        $category = $action->execute(
            new GetReportCategoryByIdRequest(
                (int) $request->id
            )
        )->getResponse();

        return response()->json($category);
    }
}
