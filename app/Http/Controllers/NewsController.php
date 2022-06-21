<?php

namespace App\Http\Controllers;

use App\Actions\News\GetAllNewsByPaginationAction;
use App\Actions\News\GetAllNewsByTagAction;
use App\Actions\News\GetAllNewsByTagRequest;
use App\Actions\News\GetAllNewsForAdminAction;
use App\Actions\News\GetNewsBySlugAction;
use App\Actions\News\GetNewsBySlugRequest;
use App\Actions\News\GetTagNewsByPaginationAction;
use App\Http\Presenters\News\GetNewsAsArrayPresenter;
use App\Http\Presenters\News\GetNewsBySlugPresenter;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function getAllNewsPage()
    {
        return view('pages.news.news-list-page');
    }

    public function getNewsByPagination(GetAllNewsByPaginationAction $byPaginationAction)
    {
        $news = $byPaginationAction->execute()->getResponse();

        return response()->json($news);
    }

    public function getNewsTagByPagination(GetTagNewsByPaginationAction $byPaginationAction, $tagName)
    {
        $news = $byPaginationAction->execute($tagName)->getResponse();

        return response()->json($news);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function getNewsBySlug(GetNewsBySlugPresenter $presenter, GetNewsBySlugAction $getNewsBySlugAction, string $slug)
    {
        $news = $getNewsBySlugAction->execute(
            new GetNewsBySlugRequest($slug)
        )->getResponse();

        return view('pages.news.news-page', ['data' => $presenter->present($news)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function getAllNewsByTag()
    {
        return view('pages.news.news-list-tag-page');
    }
}
