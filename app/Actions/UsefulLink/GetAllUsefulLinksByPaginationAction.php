<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Constant\UsefulLinkConstant;
use App\Repositories\UsefulLink\UsefulLinkRepositoryInterface;

final class GetAllUsefulLinksByPaginationAction
{
    private UsefulLinkRepositoryInterface $usefulLinkRepository;

    public function __construct(UsefulLinkRepositoryInterface $usefulLinkRepository)
    {
        $this->usefulLinkRepository = $usefulLinkRepository;
    }

    public function execute(): GetAllUsefulLinksByPaginationResponse
    {
        $usefulLinks = $this->usefulLinkRepository->getUsefulLinksByPaginate(UsefulLinkConstant::ADMIN_PER_PAGE);

        return new GetAllUsefulLinksByPaginationResponse($usefulLinks);
    }
}
