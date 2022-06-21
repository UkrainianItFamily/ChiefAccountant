<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Repositories\UsefulLink\UsefulLinkRepositoryInterface;

final class DeleteUsefulLinkAction
{
    private UsefulLinkRepositoryInterface $usefulLinkRepository;

    public function __construct(UsefulLinkRepositoryInterface $usefulLinkRepository)
    {
        $this->usefulLinkRepository = $usefulLinkRepository;
    }

    public function execute(DeleteUsefulLinkRequest $request): void
    {
        $usefulLink = $this->usefulLinkRepository->getUsefulLinkById($request->getId());

        $this->usefulLinkRepository->deleteUsefulLink($usefulLink);
    }
}
