<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Repositories\UsefulLink\UsefulLinkRepositoryInterface;

final class GetUsefulLinksByLimitAction
{
    private UsefulLinkRepositoryInterface $usefulLinkRepository;

    public function __construct(UsefulLinkRepositoryInterface $usefulLinkRepository)
    {
        $this->usefulLinkRepository = $usefulLinkRepository;
    }

    public function execute(GetUsefulLinksByLimitRequest $request): GetUsefulLinksByLimitResponse
    {
        $usefulLinks = $this->usefulLinkRepository->getUsefulLinksByLimit($request->getOffset(), $request->getLimit());

        return new GetUsefulLinksByLimitResponse($usefulLinks);
    }
}
