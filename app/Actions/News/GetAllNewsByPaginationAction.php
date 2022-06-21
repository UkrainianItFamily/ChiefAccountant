<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Constant\NewsConstant;
use App\Repositories\News\NewsRepositoryInterface;

final class GetAllNewsByPaginationAction
{
    private NewsRepositoryInterface $newsRepositoryInterface;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface)
    {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
    }

    public function execute(): GetAllNewsByPaginationResponse
    {
        $news = $this->newsRepositoryInterface->getNewsByPaginate(NewsConstant::PER_PAGE);

        return new GetAllNewsByPaginationResponse($news);
    }
}
