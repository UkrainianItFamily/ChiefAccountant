<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Constant\NewsConstant;
use App\Repositories\News\NewsRepositoryInterface;

final class GetTagNewsByPaginationAction
{
    private NewsRepositoryInterface $newsRepositoryInterface;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface)
    {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
    }

    public function execute($tagName): GetAllNewsByPaginationResponse
    {
        $news = $this->newsRepositoryInterface->getNewsByTagPaginate(NewsConstant::PER_PAGE, $tagName);

        return new GetAllNewsByPaginationResponse($news);
    }
}
