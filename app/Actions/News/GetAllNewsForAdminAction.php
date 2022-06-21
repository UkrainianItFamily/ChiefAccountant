<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Constant\NewsConstant;
use App\Repositories\News\NewsRepositoryInterface;

final class GetAllNewsForAdminAction
{
    private NewsRepositoryInterface $newsRepositoryInterface;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface)
    {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
    }

    public function execute(): GetAllNewsForAdminResponse
    {
        $perPage = NewsConstant::ADMIN_PER_PAGE;

        $news = $this->newsRepositoryInterface->getNewsByPaginate($perPage);

        return new GetAllNewsForAdminResponse($news);
    }
}
