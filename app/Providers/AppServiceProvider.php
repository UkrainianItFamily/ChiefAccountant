<?php

namespace App\Providers;

use App\Repositories\App\AppRepository;
use App\Repositories\App\AppRepositoryInterface;
use App\Repositories\Feedback\FeedbackRepository;
use App\Repositories\Feedback\FeedbackRepositoryInterface;
use App\Repositories\FeedbackInfo\FeedbackInfoRepository;
use App\Repositories\FeedbackInfo\FeedbackInfoRepositoryInterface;
use App\Repositories\FeedbackQuestion\FeedbackQuestionRepository;
use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;
use App\Repositories\FeedbackQuestionSubCategory\FeedbackQuestionSubCategoryRepository;
use App\Repositories\CurrencyRate\CurrencyRateRepository;
use App\Repositories\CurrencyRate\CurrencyRateRepositoryInterface;
use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityInterface;
use App\Repositories\EntrepreneurialActivity\EntrepreneurialActivityRepository;
use App\Repositories\Help\HelpRepository;
use App\Repositories\Help\HelpRepositoryInterface;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\HelpCategory\HelpCategoryRepository;
use App\Repositories\HelpCategory\HelpCategoryRepositoryInterface;
use App\Repositories\LegislationNews\LegislationNewsRepository;
use App\Repositories\LegislationNews\LegislationNewsRepositoryInterface;
use App\Repositories\MainSlider\MainSliderRepository;
use App\Repositories\MainSlider\MainSliderRepositoryInterface;
use App\Repositories\News\NewsRepository;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Published\PublishedRepository;
use App\Repositories\Published\PublishedRepositoryInterface;
use App\Repositories\Report\ReportRepository;
use App\Repositories\Report\ReportRepositoryInterface;
use App\Repositories\ReportCategory\ReportCategoryRepository;
use App\Repositories\ReportCategory\ReportCategoryRepositoryInterface;
use App\Repositories\ReportRedaction\ReportRedactionRepository;
use App\Repositories\ReportRedaction\ReportRedactionRepositoryInterface;
use App\Repositories\Search\SearchRepository;
use App\Repositories\Search\SearchRepositoryInterface;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\UsefulLink\UsefulLinkRepository;
use App\Repositories\UsefulLink\UsefulLinkRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        NewsRepositoryInterface::class => NewsRepository::class,
        TagRepositoryInterface::class => TagRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        CurrencyRateRepositoryInterface::class => CurrencyRateRepository::class,
        PublishedRepositoryInterface::class => PublishedRepository::class,
        FeedbackRepositoryInterface::class => FeedbackRepository::class,
        FeedbackInfoRepositoryInterface::class => FeedbackInfoRepository::class,
        FeedbackQuestionRepositoryInterface::class => FeedbackQuestionRepository::class,
        ReportRepositoryInterface::class => ReportRepository::class,
        ReportCategoryRepositoryInterface::class => ReportCategoryRepository::class,
        UsefulLinkRepositoryInterface::class => UsefulLinkRepository::class,
        MainSliderRepositoryInterface::class => MainSliderRepository::class,
        SearchRepositoryInterface::class => SearchRepository::class,
        LegislationNewsRepositoryInterface::class => LegislationNewsRepository::class,
        ImageRepositoryInterface::class => ImageRepository::class,
        HelpCategoryRepositoryInterface::class => HelpCategoryRepository::class,
        HelpRepositoryInterface::class => HelpRepository::class,
        ReportRedactionRepositoryInterface::class => ReportRedactionRepository::class,
        AppRepositoryInterface::class => AppRepository::class,
        EntrepreneurialActivityInterface::class => EntrepreneurialActivityRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
