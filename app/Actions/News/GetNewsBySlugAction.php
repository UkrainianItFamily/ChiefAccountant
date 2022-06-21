<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class GetNewsBySlugAction
{
    private NewsRepositoryInterface $newsRepository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function execute(GetNewsBySlugRequest $request): GetNewsBySlugResponse
    {
        $news = $this->newsRepository->getNewsBySlug($request->getSlug());

        if (!$news) {
            throw new ModelNotFoundException();
        }

        return new GetNewsBySlugResponse($news);
    }
}
