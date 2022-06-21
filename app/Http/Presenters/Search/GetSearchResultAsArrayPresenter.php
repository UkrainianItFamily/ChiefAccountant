<?php

namespace App\Http\Presenters\Search;

use App\Constant\SearchConstant;
use App\Contracts\PresenterPaginationInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSearchResultAsArrayPresenter implements PresenterPaginationInterface
{
    public function presentPagination(LengthAwarePaginator $searchResults): array
    {
        $searchResultsArray = $searchResults
            ->map(
                function (Model $result) {
                    return $this->present($result);
                }
            )
            ->all();
        $searchResultsArray['pagination'] = $searchResults->pagination;

        return $searchResultsArray;
    }

    public function present(Model $result): Model
    {
        $result->formatDate = $result->getCreatedDate()->translatedFormat('d M Y');

        switch (class_basename($result)) {
            case 'News':
                $result->link = route(SearchConstant::NEWS_ROUTE_NAME, $result->slug);
                break;
            case 'Report':
                $result->link = route(SearchConstant::REPORT_ROUTE_NAME, $result->slug);
                break;
        }

        return $result;
    }
}
