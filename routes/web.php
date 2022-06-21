<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCurrencyRateController;
use App\Http\Controllers\Admin\AdminHelpCategoriesController;
use App\Http\Controllers\Admin\AdminHelpController;
use App\Http\Controllers\Admin\AdminMainSliderController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminPublishedController;
use App\Http\Controllers\Admin\AdminReportCategoryController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminUsefulLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublishedController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\Admin\AdminEntrepreneurialActivityController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminFeedbackQuestionController;
use App\Http\Controllers\Admin\AdminFeedbackInfoController;
use App\Http\Controllers\Admin\AdminFeedbackController;

Route::get('/', [HomeController::class, 'getHomePage'])->name('index');
Route::get('test', [HomeController::class, 'test3'])->name('test');
Route::get('report-list', [HomeController::class, 'getReportListPage'])->name('report.list');
Route::get('normbasa/{id}', [HomeController::class, 'getNormbasaPage'])->name('normbasa');
Route::get('normbasa-detail/{id}', [HomeController::class, 'getNormbasaDetailPage'])->name('normbasa.detail');
//Route::get('налоговая-система', [HomeController::class, 'getHelpPage'])->name('help');
//Route::get('консультации-аналитика', [HomeController::class, 'getHelpPage'])->name('help');
Route::prefix('report')->group(function () {
    Route::get('/', [ReportController::class, 'getReportListPage'])->name('reporting.getAllReports');
    Route::get('/{slug}', [ReportController::class, 'getReportListPage'])
        ->where('slug', '.*')
        ->name('reporting.getReport');
});


Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'getAllNewsPage'])->name('news.getAllPage');
    Route::get('{slug}', [NewsController::class, 'getNewsBySlug'])->name('news.show');
    Route::get('/tag/{tag}', [NewsController::class, 'getAllNewsByTag'])->name('news.getAllNewsByTag');
    Route::get('/news/load-more', [NewsController::class, 'loadMoreNews'])->name('news.loadMore');
});
Route::prefix('published-on-site')->group(function () {
    Route::get('/', [PublishedController::class, 'getPaginationPublishesPage'])->name('published.getAllUser');

});
//Route::get('calendar', [CalendarController::class, 'getCalendar'])->name('calendar.getCalendar');
Route::get('currency-archive', [CurrencyRateController::class, 'getAllCurrencyRatesPage'])->name('currency.getAll');
//Route::get('useful-links', [UsefulLinksController::class, 'getCalendar'])->name('useful-links');
Route::get('help', [HomeController::class, 'getHelpPage'])->name('help');
Route::get('contacts', [HomeController::class, 'getFeedbackPage'])->name('contacts');
Route::post('contacts', [HomeController::class, 'createFeedbackPage'])->name('contacts.create');

Route::get('/forgot-password', [AuthController::class, 'getForgotPasswordPage'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendForgotPasswordLink'])->name('forgot-password-link');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::get('/reset-password/{email}/{token}', [AuthController::class, 'getResetPasswordForm'])->name('password.reset');

Route::prefix('user')->group(function () {
    Route::get('login', [AuthController::class, 'getLoginPage'])->name('user.loginPage');
    Route::post('login', [AuthController::class, 'authUser'])->name('user.auth');
    Route::middleware(['auth'])->get('logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('registration', [AuthController::class, 'getRegistrationPage'])->name('user.registrationPage');
    Route::get('/email/verify/{id}/{hash}', [UserController::class, 'confirmUserEmail'])->name('verification.verify');
    Route::post('registration', [AuthController::class, 'registrationUser'])->name('user.save');


    Route::get('personal/{id}', [PersonalController::class, 'getPersonalPage'])->name('user.personalPage');
    Route::get('personal/edit-password/{id}', [PersonalController::class, 'getEditPasswordPage'])->name('user.editPasswordPage');
    Route::patch('personal/edit-password/{id}', [PersonalController::class, 'updatePersonalPassword'])->name('user.update.personalPassword');
    Route::get('personal/favorites/{id}', [PersonalController::class, 'getFavoritesPage'])->name('user.favoritesPage');
    Route::patch('personal/{id}', [PersonalController::class, 'updatePersonalData'])->name('user.update.personalData');
    Route::patch('personal/access/{id}', [PersonalController::class, 'updateAccessPersonal'])->name('user.updateAccessPersonal');
    Route::post('personal/send-contract', [PersonalController::class, 'sendContractToEmail'])->name('user.sendContractToEmail');

});

Route::middleware(['middleware' => 'admin'])
    ->prefix('administrator')
    ->group(function () {
        Route::get('/', [AdminController::class, 'getAdminHomePage'])->name('admin.homePage');

        Route::get('news', [AdminNewsController::class, 'getAllNewsAdmin'])->name('admin.getAllNews');
        Route::post('news/save', [AdminNewsController::class, 'saveNews'])->name('admin.newsSave');
        Route::get('news/create', [AdminNewsController::class, 'getNewsCreatePage'])->name('admin.newsCreate');
        Route::patch('news/{id}', [AdminNewsController::class, 'updateNews'])->name('admin.newsUpdate');
        Route::delete('news/{id}', [AdminNewsController::class, 'destroyNews'])->name('admin.newsDestroy');
        Route::get('news/{slug}/edit', [AdminNewsController::class, 'getNewsEditPage'])->name('admin.getNewsForEdit');

        Route::get('published-on-site', [AdminPublishedController::class, 'getAllPublishedPage'])->name('admin.getAllPublishes');
        Route::get('published-on-site/{id}/edit', [AdminPublishedController::class, 'getPublicationEditPage'])->name('admin.getPublicatonEdit');
        Route::patch('published-on-site/{id}', [AdminPublishedController::class, 'updatePublication'])->name('admin.publicationUpdate');
        Route::get('published-on-site/create', [AdminPublishedController::class, 'getPublicationCreatePage'])->name('admin.publicationCreate');
        Route::post('published-on-site/save', [AdminPublishedController::class, 'savePublication'])->name('admin.publicationSave');

        Route::get('currency-archive', [AdminCurrencyRateController::class, 'getAllCurrencyAdmin'])->name('admin.getAllCurrencys');
        Route::post('currency-archive/save', [AdminCurrencyRateController::class, 'createCurrency'])->name('admin.currencySave');
        Route::patch('currency-archive/{id}', [AdminCurrencyRateController::class, 'updateCurrency'])->name('admin.currencyUpdate');
        Route::delete('currency-archive/{id}', [AdminCurrencyRateController::class, 'destroyCurrency'])->name('admin.currencyDestroy');

        Route::get('useful-links', [AdminUsefulLinkController::class, 'getAllUsefulLinksAdmin'])->name('admin.getAllUsefulLinks');
        Route::post('useful-links/save', [AdminUsefulLinkController::class, 'saveUsefulLink'])->name('admin.usefulLinkSave');
        Route::patch('useful-links/', [AdminUsefulLinkController::class, 'updateUsefulLink'])->name('admin.usefulLinkUpdate');
        Route::delete('useful-links/{id}', [AdminUsefulLinkController::class, 'deleteUsefulLink'])->name('admin.usefulLinkDestroy');

        Route::get('main-slider', [AdminMainSliderController::class, 'getAllMainSlidesAdmin'])->name('admin.getAllMainSliderSlides');
        Route::post('main-slider/save', [AdminMainSliderController::class, 'saveSlide'])->name('admin.mainSliderSaveSlide');
        Route::patch('main-slider/', [AdminMainSliderController::class, 'updateSlide'])->name('admin.mainSliderUpdateSlide');
        Route::delete('main-slider/{id}', [AdminMainSliderController::class, 'deleteSlide'])->name('admin.mainSliderDeleteSlide');

        Route::get('reports', [AdminReportController::class, 'getAllReports'])->name('admin.getAllReports');
        Route::get('reports/create', [AdminReportController::class, 'getCreateReportPage'])->name('admin.getCreateReportPage');
        Route::post('reports/create', [AdminReportController::class, 'createReport'])->name('admin.saveReport');
        Route::get('report/{slug}/edit', [AdminReportController::class, 'getEditReportPage'])->name('admin.getEditReportPage');
        Route::patch('report/{slug}', [AdminReportController::class, 'updateReport'])->name('admin.updateReport');
        Route::delete('report/{id}', [AdminReportController::class, 'deleteReport'])->name('admin.deleteReport');

        Route::get('reports-category', [AdminReportCategoryController::class, 'getCreateReportCategoryPage'])->name('admin.getAllReportsCategory');
        Route::post('reports-category/create', [AdminReportCategoryController::class, 'createReportCategory'])->name('admin.saveReportCategory');
        Route::get('reports-category/{slug}/edit', [AdminReportCategoryController::class, 'getEditReportPage'])->name('admin.getEditReportCategoryPage');
        Route::patch('reports-category', [AdminReportCategoryController::class, 'updateReportCategory'])->name('admin.updateReportCategory');
        Route::delete('reports-category/{id}', [AdminReportCategoryController::class, 'deleteReportCategory'])->name('admin.deleteReportCategory');

        Route::get('help/categories', [AdminHelpCategoriesController::class, 'getAllHelpCategoriesPage'])->name('admin.getAllHelpCategories');
        Route::post('help/categories/save', [AdminHelpCategoriesController::class, 'saveHelpCategory'])->name('admin.saveHelpCategory');
        Route::patch('help/categories/', [AdminHelpCategoriesController::class, 'updateHelpCategory'])->name('admin.helpCategorySave');

        Route::get('help/posts', [AdminHelpController::class, 'getAllHelpsPage'])->name('admin.getAllHelps');
        Route::post('help/posts/save', [AdminHelpController::class, 'saveHelp'])->name('admin.helpSave');

        Route::get('entrepreneurial-activity', [AdminEntrepreneurialActivityController::class, 'getAllEntrepreneurialActivityPage'])->name('admin.getAllEntrepreneurialActivity');
        Route::post('entrepreneurial-activity/save', [AdminEntrepreneurialActivityController::class, 'saveEntrepreneurialActivity'])->name('admin.saveEntrepreneurialActivity');
        Route::get('entrepreneurial-activity/edit/{id}', [AdminEntrepreneurialActivityController::class, 'getEditEntrepreneurialActivityPage'])->name('admin.getEditEntrepreneurialActivity');
        Route::patch('entrepreneurial-activity', [AdminEntrepreneurialActivityController::class, 'updateEntrepreneurialActivity'])->name('admin.updateEntrepreneurialActivity');
        Route::delete('entrepreneurial-activity/{id}', [AdminEntrepreneurialActivityController::class, 'deleteEntrepreneurialActivity'])->name('admin.deleteEntrepreneurialActivity');
        Route::get('users', [AdminUserController::class, 'getUserListPage'])->name('admin.getUserListPage');
        Route::get('users/{id}/edit', [AdminUserController::class, 'getEditUserPage'])->name('admin.getEditUserPage');
        Route::patch('users/{id}', [AdminUserController::class, 'updateUser'])->name('admin.updateUser');
        Route::delete('users/{id}', [AdminUserController::class, 'deleteUser'])->name('admin.deleteUser');

        Route::get('contacts', [AdminFeedbackController::class, 'getAllFeedbackPage'])->name('admin.contacts.getAllFeedbackPage');
        Route::get('contacts/{id}', [AdminFeedbackController::class, 'showFeedback'])->name('admin.contacts.showFeedback');
        Route::delete('contacts/{id}', [AdminFeedbackController::class, 'deleteFeedback'])->name('admin.contacts.deleteFeedback');

        Route::get('contact/info', [AdminFeedbackInfoController::class, 'getAllFeedbackInfo'])->name('admin.contacts.getAllFeedbackInfo');
        Route::post('contact/info/create', [AdminFeedbackInfoController::class, 'createFeedbackInfo'])->name('admin.contacts.info.createFeedbackInfo');
        Route::get('contact/info/{id}', [AdminFeedbackInfoController::class, 'editFeedbackInfo'])->name('admin.contacts.info.editFeedbackInfo');
        Route::patch('contact/info', [AdminFeedbackInfoController::class, 'updateFeedbackInfo'])->name('admin.contacts.info.updateFeedbackInfo');
        Route::delete('contact/info/{id}', [AdminFeedbackInfoController::class, 'deleteFeedbackInfo'])->name('admin.contacts.info.deleteFeedbackInfo');

        Route::get('contact/question', [AdminFeedbackQuestionController::class, 'getParentsCategoryById'])->name('admin.contacts.question');
        Route::post('contact/question/create', [AdminFeedbackQuestionController::class, 'createFeedbackQuestion'])->name('admin.contacts.question.create');
        Route::get('contacts/question/show/{id}', [AdminFeedbackQuestionController::class, 'showFeedbackQuestion'])->name('admin.contacts.question.show');
        Route::get('contact/question/{id}', [AdminFeedbackQuestionController::class, 'editFeedbackQuestion'])->name('admin.contacts.question.edit');
        Route::patch('contact/question', [AdminFeedbackQuestionController::class, 'updateFeedbackQuestion'])->name('admin.contacts.question.update');
        Route::delete('contact/question/{id}', [AdminFeedbackQuestionController::class, 'deleteFeedbackQuestion'])->name('admin.contacts.question.delete');

        Route::post('contact/sub_question/create', [AdminFeedbackQuestionController::class, 'createSubCategory'])->name('admin.contacts.question.subcategory.create');
        Route::get('contact/sub_question/{id}', [AdminFeedbackQuestionController::class, 'editSubCategory'])->name('admin.contacts.question.subcategory.edit');
        Route::patch('contact/sub_question', [AdminFeedbackQuestionController::class, 'updateSubCategory'])->name('admin.contacts.question.subcategory.update');
        Route::delete('contact/sub_question/{id}', [AdminFeedbackQuestionController::class, 'deleteSubCategory'])->name('admin.contacts.question.subcategory.delete');
    });

Route::get('currency-archive', [CurrencyRateController::class, 'getAllCurrencyRatesPage'])->name('currency.getAll');

Route::prefix('published-on-site')->group(function () {
   Route::get('/', [PublishedController::class, 'getPaginationPublishesPage'])->name('published.getAllUser');

});

//Route::prefix('report')->group(function () {
//    Route::get('/', [ReportController::class, 'getReportListPage'])->name('reporting.getAllReports');
//    Route::get('/{slug}', [ReportController::class, 'getReportListPage'])
//        ->where('slug', '.*')
//        ->name('reporting.getReport');
//});

Route::get('search', [SearchController::class, 'getSearch'])->name('search');
