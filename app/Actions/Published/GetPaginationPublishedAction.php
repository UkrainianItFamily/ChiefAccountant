<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Repositories\Published\PublishedRepositoryInterface;

final class GetPaginationPublishedAction
{
    private PublishedRepositoryInterface $publishedRepository;

    public function __construct(PublishedRepositoryInterface $publishedRepository)
    {
        $this->publishedRepository = $publishedRepository;
    }

    public function execute(GetPaginationPublishedRequest $request): GetPaginationPublishedResponse
    {
        $publishes = $this->publishedRepository->getPaginationPublishes($request->getOffset());

        return new GetPaginationPublishedResponse($publishes);
    }
}
