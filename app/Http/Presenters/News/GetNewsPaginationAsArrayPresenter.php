<?php

namespace App\Http\Presenters\News;

use App\Contracts\PresenterPaginationInterface;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class GetNewsPaginationAsArrayPresenter implements PresenterPaginationInterface
{
    public function presentPagination(LengthAwarePaginator $newsCollection): array
    {
        return $newsCollection
            ->map(
                function (News $news) {
                    return $this->present($news);
                }
            )
            ->all();
    }

    public function present(News $news)
    {
        $formatedDate = Carbon::parse($news->created_at)->translatedFormat('d M Y');

        $news->date = $formatedDate;

        return $news;
    }
}
