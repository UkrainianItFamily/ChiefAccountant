<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Repositories\UsefulLink\UsefulLinkRepositoryInterface;

final class UpdateUsefulLinkAction
{
    private UsefulLinkRepositoryInterface $usefulLinkRepository;

    public function __construct(UsefulLinkRepositoryInterface $usefulLinkRepository)
    {
        $this->usefulLinkRepository = $usefulLinkRepository;
    }

    public function execute(UpdateUsefulLinkRequest $request): UpdateUsefulLinkResponse
    {
        $updateUsefulLink = $this->usefulLinkRepository->getUsefulLinkById($request->getId());

        $updateUsefulLink->title = $request->getTitle();
        $updateUsefulLink->link = $request->getLink();

        $this->usefulLinkRepository->updateUsefulLink($updateUsefulLink);

        return new UpdateUsefulLinkResponse($updateUsefulLink);
    }
}
