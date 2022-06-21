<?php

namespace App\Http\Controllers\Admin;

use App\Actions\News\AddNewsAction;
use App\Actions\News\AddNewsRequest;
use App\Actions\News\DeleteNewsAction;
use App\Actions\News\DeleteNewsRequest;
use App\Actions\News\GetAllNewsForAdminAction;
use App\Actions\News\GetNewsBySlugAction;
use App\Actions\News\GetNewsBySlugRequest;
use App\Actions\News\UpdateNewsAction;
use App\Actions\News\UpdateNewsRequest;
use App\Actions\Tag\AddTagsAction;
use App\Actions\Tag\AddTagsRequest;
use App\Http\Controllers\Controller;
use App\Http\Presenters\News\GetNewsAsArrayPresenter;
use App\Http\Presenters\News\GetNewsByIdForEditPresenter;
use App\Http\Requests\News\CreateNewsValidateRequest;
use App\Http\Requests\News\UpdateNewsValidateRequest;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function getAllNewsAdmin(GetAllNewsForAdminAction $getAllNewsAction, GetNewsAsArrayPresenter $presenter)
    {
        $tags = Tag::all();
        $news = $getAllNewsAction->execute()->getResponse();

        return view('pages.admin.news.news-list-page', ['data' => $news, 'tags' => $tags]);
    }

    public function getNewsCreatePage(AddTagsAction $addTagsAction)
    {
        $tags = Tag::all();
        $tags = $addTagsAction->getTagsArr($tags, 'name');

        return view('pages.admin.news.news-create-page', ['tags'=>$tags]);
    }

    public function saveNews(CreateNewsValidateRequest $request, AddNewsAction $addNewsAction)
    {
        $news = $addNewsAction->execute(
            new AddNewsRequest(
                $request->input('title'),
                $request->input('description'),
                $request->input('text'),
                $request->input('tags'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllNews');
    }

    public function getNewsEditPage(GetNewsByIdForEditPresenter $presenter, GetNewsBySlugAction $getNewsBySlugAction, string $slug)
    {
        $news = $getNewsBySlugAction->execute(
            new GetNewsBySlugRequest($slug)
        )->getResponse();

        return view('pages.admin.news.news-edit-page', ['data' => $presenter->present($news)]);
    }

    public function updateNews(UpdateNewsValidateRequest $request, UpdateNewsAction $updateNewsAction, string $id)
    {
        $updateNews = $updateNewsAction->execute(
            new UpdateNewsRequest(
                (int)$id,
                $request->input('slug'),
                $request->input('title'),
                $request->input('description'),
                $request->input('text'),
                $request->input('tags'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getNewsForEdit', $request->input('slug'));
    }

    public function destroyNews(DeleteNewsAction $deleteNewsAction, string $id)
    {
        $deleteNewsAction->execute(
            new DeleteNewsRequest((int)$id)
        );

        return $this->successResponseRedirect('Успешно удалено', 'admin.getAllNews');
    }
}
