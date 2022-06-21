<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Repositories\Published\PublishedRepositoryInterface;

final class UpdatePublicationAction
{
    private PublishedRepositoryInterface $publishedRepository;

    public function __construct(PublishedRepositoryInterface $publishedRepository)
    {
        $this->publishedRepository = $publishedRepository;
    }

    public function execute(UpdatePublicationRequest $request): UpdatePublicationResponse
    {
        $updatePublication = $this->publishedRepository->getPublishedById($request->getId());

        $updatePublication->description = $request->getDescription();
        $updatePublication->link = $request->getLink();
        $updatePublication->date = $request->getDate();

        $this->publishedRepository->updatePublication($updatePublication);

        return new UpdatePublicationResponse($updatePublication);
    }
}
