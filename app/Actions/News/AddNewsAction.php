<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Actions\Tag\AddTagsAction;
use App\Actions\Tag\AddTagsRequest;
use App\Models\News;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Support\Str;

final class AddNewsAction
{
    private NewsRepositoryInterface $newsRepository;
    private AddTagsAction $addTagsAction;

    public function __construct(NewsRepositoryInterface $newsRepository, AddTagsAction $addTagsAction)
    {
        $this->newsRepository = $newsRepository;
        $this->addTagsAction = $addTagsAction;
    }

    public function execute(AddNewsRequest $request): AddNewsResponse
    {
        $news = new News();

        $news->title = $request->getTitle();
        $news->description = $request->getDescription();
        $news->text = $request->getText();

        $news = $this->newsRepository->saveNews($news);

        $news->slug = Str::slug($request->getTitle(), '-') . "-" . $news->id;

        $news = $this->newsRepository->updateNews($news);

        if ($request->getTags()) {
            $tags = $this->addTagsAction->execute(
                new AddTagsRequest(
                    $request->getTags(),
                )
            )->getResponse();

            $this->newsRepository->syncNewsWithTags($news, $tags);
        }

        return new AddNewsResponse($news);
    }
}
