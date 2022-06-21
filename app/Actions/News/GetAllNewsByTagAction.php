<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;

final class GetAllNewsByTagAction
{
    private NewsRepositoryInterface $newsRepositoryInterface;
    private TagRepositoryInterface $tagRepositoryInterface;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface, TagRepositoryInterface $tagRepositoryInterface)
    {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
        $this->tagRepositoryInterface = $tagRepositoryInterface;
    }

    public function execute(GetAllNewsByTagRequest $request): GetAllNewsByTagResponse
    {
        $tag = $this->tagRepositoryInterface->getBySlug($request->getSLug());
        $news = $this->newsRepositoryInterface->getAllNewsByTag($tag);

        return new GetAllNewsByTagResponse($news);
    }
}
