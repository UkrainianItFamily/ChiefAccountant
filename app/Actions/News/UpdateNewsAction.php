<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Actions\Tag\AddTagsAction;
use App\Actions\Tag\AddTagsRequest;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Support\Str;

final class UpdateNewsAction
{
    private NewsRepositoryInterface $newsRepositoryInterface;
    private AddTagsAction $addTagsAction;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface, AddTagsAction $addTagsAction)
    {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
        $this->addTagsAction = $addTagsAction;
    }

    public function execute(UpdateNewsRequest $request): UpdateNewsResponse
    {
        $updateNews = $this->newsRepositoryInterface->getNewsById($request->getId());

        $updateNews->slug = Str::slug($request->getSlug());
        $updateNews->title = $request->getTitle();
        $updateNews->description = $request->getDescription();
        $updateNews->text = $request->getText();

        if ($request->getTags()) {
            $tags = $this->addTagsAction->execute(
                new AddTagsRequest(
                    $request->getTags(),
                )
            )->getResponse();

            $this->newsRepositoryInterface->syncNewsWithTags($updateNews, $tags);
        } else {
            $this->newsRepositoryInterface->deleteTagsFromNews($updateNews);
        }

        $this->newsRepositoryInterface->updateNews($updateNews);

        return new UpdateNewsResponse($updateNews);
    }
}
