<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Repositories\News\NewsRepositoryInterface;

final class DeleteNewsAction
{
    private NewsRepositoryInterface $newsRepositoryInterface;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface)
    {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
    }

    public function execute(DeleteNewsRequest $request): void
    {
        $news = $this->newsRepositoryInterface->getNewsById($request->getId());

        $this->newsRepositoryInterface->deleteNews($news);
    }
}
