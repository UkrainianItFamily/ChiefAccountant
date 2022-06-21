<?php

namespace App\Http\Controllers;

use App\Actions\Search\GetSearchResultAction;
use App\Actions\Search\GetSearchResultRequest;
use App\Http\Presenters\Search\GetSearchResultAsArrayPresenter;
use App\Http\Requests\Search\SearchInputValidateRequest;

class SearchController extends Controller
{
   public function getSearch(GetSearchResultAction $action,SearchInputValidateRequest $request, GetSearchResultAsArrayPresenter $presenter)
   {
        $results = $action->execute(
            new GetSearchResultRequest(
                $request->input('search')
            )
        )->getResponse();

        return view('pages.search.searchResult-list-page', [
            'searchResults' => $presenter->presentPagination($results),
            'request' => $request->input('search')
        ]);
   }
}
