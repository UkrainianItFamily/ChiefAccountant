<?php

namespace App\Http\Controllers;

use App\Actions\Feedback\AddFeedbackAction;
use App\Actions\Feedback\AddFeedbackRequest;
use App\Actions\Feedback\GetFeedbackAction;
use App\Actions\Feedback\GetFeedbackPageAction;
use App\Actions\CurrencyRate\GetThreeLastCurrencyRatesAction;
use App\Actions\MainSlider\GetActiveSlidersAction;
use App\Actions\News\GetAllNewsByPaginationAction;
use App\Actions\Published\GetPublicationsByLimitAction;
use App\Actions\Published\GetPublicationsByLimitRequest;
use App\Actions\UsefulLink\GetUsefulLinksByLimitAction;
use App\Actions\UsefulLink\GetUsefulLinksByLimitRequest;
use App\Constant\HomeConstant;
use App\Http\Presenters\News\GetNewsPaginationAsArrayPresenter;
use App\Http\Presenters\Published\GetPublishedAsArrayPresenter;
use App\Http\Requests\Feedback\CreateFeedbackValidateRequest;
use App\Models\News;
use App\Models\Tag;
use DB;

class HomeController extends Controller
{
    public function getHomePage(
        GetAllNewsByPaginationAction $allNewsByPaginationAction,
        GetThreeLastCurrencyRatesAction $getThreeLastCurrencyRatesAction,
        GetPublicationsByLimitAction $getPublicationsByLimitAction,
        GetUsefulLinksByLimitAction $getUsefulLinksByLimitAction,
        GetActiveSlidersAction $getActiveSlidersAction,
        GetPublishedAsArrayPresenter $publishedAsArrayPresenter,
        GetNewsPaginationAsArrayPresenter $newsPaginationAsArrayPresenter
    )
    {
        $news = $allNewsByPaginationAction->execute()->getResponse();

        $currencyRates = $getThreeLastCurrencyRatesAction->execute()->getResponse();

        $publications = $getPublicationsByLimitAction->execute(
            new GetPublicationsByLimitRequest(
                HomeConstant::PUBLISHED_PER_PAGE,
            )
        )->getResponse();

        $usefulLinks = $getUsefulLinksByLimitAction->execute(
            new GetUsefulLinksByLimitRequest()
        )->getResponse();

        $activeSliders = $getActiveSlidersAction->execute()->getResponse();

        return view('pages.home.home-page', [
            'news' => $newsPaginationAsArrayPresenter->presentPagination($news),
            'currencyRates' => $currencyRates,
            'publications' => $publishedAsArrayPresenter->presentCollection($publications),
            'usefulLinks' => $usefulLinks,
            'activeSliders' => $activeSliders,
        ]);
    }

    public function getReportListPage()
    {
        return view('pages.normbasa.otchetnost-page');
    }

    public function getNormbasaPage($id)
    {
//        dump($id);
        return view('pages.normbasa.normbasa-page');
    }

    public function getNormbasaDetailPage($id)
    {
//        dump($id);
        return view('pages.normbasa.normbasa-detail-page');
    }

    public function getHelpPage()
    {
        return view('pages.help.help-page');
    }

    public function getFeedbackPage(GetFeedbackPageAction $getFeedbackPageAction, GetFeedbackAction $getFeedbackAction)
    {
        $getCategories = $getFeedbackPageAction->execute()->getResponse();
        $getFeedbackInfo = $getFeedbackAction->execute()->getResponse();

        return view('pages.contact.contacts-page', compact('getFeedbackInfo',  'getCategories'));
    }

    public function createFeedbackPage(CreateFeedbackValidateRequest $request, AddFeedbackAction $addFeedbackAction)
    {
        $createFeedback = $addFeedbackAction->execute(
            new AddFeedbackRequest(
                $request->input('name'),
                $request->input('email'),
                $request->input('phone'),
                $request->input('question_topic_id'),
                $request->input('description'))
        );

        return $this->successResponseRedirect('Ваше обращение успешно отправлено', 'contacts');
    }

    public function test_00($tagName='sunt')
    {
        $tagArr = [];
        $tagId = Tag::where('name', $tagName)->first();
        $tags = DB::table('news_tag')->where('tag_id', $tagId->id)->select('news_id')->get();

        if($tags) {
            foreach ($tags as $tag) {
                $tagArr[] = $tag->news_id;
            }
        }

        $news = DB::table('news')
            ->whereIn('id', $tagArr)
            ->get();

        $news2 = News::whereIn('id', $tagArr)
            ->orderBy('created_at', 'desc')
            ->get();

        dump($tags);
        dump($tagArr);
        dump($news);
        dump($news2);

        dd($tagId->id);

        return view('pages.help.help-page');
    }

    public function test($tagName='sunt') {
        $tagId = Tag::where('name', $tagName)->first();
        $tags = DB::table('news_tag')->where('tag_id', $tagId->id)->select('news_id')->get();

        $tagArr = [];
        if($tags) {
            foreach ($tags as $tag) {
                $tagArr[] = $tag->news_id;
            }

            $news = News::whereIn('id', $tagArr)->orderBy('created_at', 'desc')->get();
        }

        dump($news);
        dd($tagId->id);
    }

    public function test3($tagName='atque') {
        $order = 'desc';
        $tag = Tag::where('name', $tagName)
            ->with(['news' => function ($q) use ($order) {
                $q->orderBy('created_at', $order);
            }])
            ->get();

        $news = $tag ? $tag[0]['news'] : null;

        dump($news);
        dd($tag);
    }
}
