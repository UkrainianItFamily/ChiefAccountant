<?php

namespace App\Http\Presenters\News;

use App\Contracts\PresenterInterface;
use App\Http\Presenters\Tag\GetTagsAsStringPresenter;
use Illuminate\Database\Eloquent\Model;

class GetNewsByIdForEditPresenter implements PresenterInterface
{
    private GetTagsAsStringPresenter $getTagsAsStringPresenter;

    public function __construct(GetTagsAsStringPresenter $getTagsAsStringPresenter)
    {
        $this->getTagsAsStringPresenter = $getTagsAsStringPresenter;
    }

    public function present(Model $model): array
    {
        $arrayNews = [
            'id' => $model->getId(),
            'slug' => $model->getSlug(),
            'title' => $model->getTitle(),
            'description' => $model->getDescription(),
            'text' => $model->getText(),
            'createdDate' => $model->getCreatedDate()->translatedFormat('d M Y'),
            'updatedDate' => $model->getUpdatedDate()->translatedFormat('d M Y'),
            'tags' => $this->getTagsAsStringPresenter->presentString($model->tags),
        ];

        return $arrayNews;
    }
}
