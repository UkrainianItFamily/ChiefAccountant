<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Repositories\Published\PublishedRepositoryInterface;

final class GetPublicationsByLimitAction
{
    private PublishedRepositoryInterface $publishedRepository;

    public function __construct(PublishedRepositoryInterface $publishedRepository)
    {
        $this->publishedRepository = $publishedRepository;
    }

    public function execute(GetPublicationsByLimitRequest $request): GetPublicationsByLimitResponse
    {
        $publications = $this->publishedRepository->getPaginationPublishes(0, $request->getLimit());

        return new GetPublicationsByLimitResponse($publications);
    }
}
