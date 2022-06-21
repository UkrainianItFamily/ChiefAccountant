<?php

use App\Http\Controllers\Admin\AdminAppController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminPublishedController;
use App\Http\Controllers\Admin\AdminReportCategoryController;
use App\Http\Controllers\Admin\AdminReportRedactionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublishedController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'getNewsByPagination'])->name('news-api.getAll');
    Route::get('/tag/{tagName}', [NewsController::class, 'getNewsTagByPagination'])->name('news-api.getAll');
});

Route::get('administrator/published-on-site/{offset}', [AdminPublishedController::class, 'getPaginationPublishes']);

Route::get('currency-archive/{year}/{month}', [CurrencyRateController::class, 'getAllCurrencyRates']);

Route::get('published-on-site/{offset}', [PublishedController::class, 'getPaginationPublishes']);
Route::get('published-on-site/{id}/delete', [AdminPublishedController::class, 'deletePublished']);

Route::get('/report/categories/{slug}', [ReportController::class, 'getSubcategories']);
Route::get('/report/{slug}/{redactionDate?}', [ReportController::class, 'getReportBySlug']);

Route::post('reports/redactions', [AdminReportRedactionController::class, 'saveReportRedaction']);
Route::patch('reports/redactions', [AdminReportRedactionController::class, 'updateReportRedaction']);
Route::get('reports/redactions/{id}', [AdminReportRedactionController::class, 'getReportRedactionById']);

Route::get('/report-categories/{id}', [AdminReportCategoryController::class, 'getReportCategoryById']);

Route::post('upload-images', [AdminImageController::class, 'saveImage']);

Route::post('/apps', [AdminAppController::class, 'getAppsList']);

