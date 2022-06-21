<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Repositories\Published\PublishedRepositoryInterface;

final class DeletePublishedAction
{
    private PublishedRepositoryInterface $publishedRepository;

    public function __construct(PublishedRepositoryInterface $publishedRepository)
    {
        $this->publishedRepository = $publishedRepository;
    }

    public function execute(DeletePublishedRequest $request): void
    {
        $published = $this->publishedRepository->getPublishedById($request->getId());

        $this->publishedRepository->deletePublished($published);
    }
}
