<?php

namespace App\Http\Presenters\Published;

use App\Contracts\PresenterCollectionInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class GetPublishedAsArrayPresenter implements PresenterCollectionInterface
{
    public function present(Collection $published): array
    {
        $publishedArray = [];

        foreach ($published as $date => $publication) {
            $date = Carbon::parse($date)->translatedFormat('d M Y');

            $publishedArray[$date] = $publication;
        }

        return $publishedArray;
    }

    public function presentCollection(Collection $collection): array
    {
        return $this->present($collection);
    }
}
