<?php

declare(strict_types=1);

namespace App\Actions\App;

use App\Repositories\App\AppRepositoryInterface;

final class GetAllAppsByIdAction
{
    private AppRepositoryInterface $appRepository;

    public function __construct(AppRepositoryInterface $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function execute(GetAllAppsByIdRequest $request): GetAllAppsByIdResponse
    {

        $app = $this->appRepository->getAppById($request->getId());

        $reportCollection = $this->appRepository->getReportsByApp($app);

        return new GetAllAppsByIdResponse($reportCollection);
    }
}
