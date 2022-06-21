<?php

namespace App\Http\Presenters\Tag;

use App\Contracts\PresenterStringInterface;
use Illuminate\Support\Collection;

class GetTagsAsStringPresenter implements PresenterStringInterface
{
    public function presentString(Collection $collection): string
    {
        return $this->present($collection);
    }

    public function present($collection): string
    {
        $arrayTags = [];

        foreach ($collection as $tag) {
            $arrayTags[] = $tag->getName();
        }

        $stringTags = implode(',', $arrayTags);

        return $stringTags;
    }
}
