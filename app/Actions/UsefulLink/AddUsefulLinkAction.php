<?php

declare(strict_types=1);

namespace App\Actions\UsefulLink;

use App\Models\UsefulLink;
use App\Repositories\UsefulLink\UsefulLinkRepositoryInterface;

final class AddUsefulLinkAction
{
    private UsefulLinkRepositoryInterface $usefulLinkRepository;

    public function __construct(UsefulLinkRepositoryInterface $usefulLinkRepository)
    {
        $this->usefulLinkRepository = $usefulLinkRepository;
    }

    public function execute(AddUsefulLinkRequest $request): AddUsefulLinkResponse
    {
        $usefulLink = new UsefulLink();

        $usefulLink->title = $request->getTitle();
        $usefulLink->link = $request->getLink();

        $usefulLink = $this->usefulLinkRepository->saveUsefulLink($usefulLink);

        return new AddUsefulLinkResponse($usefulLink);
    }
}
