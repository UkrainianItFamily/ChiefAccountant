<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Models\Published;
use App\Repositories\Published\PublishedRepositoryInterface;

final class AddPublicationAction
{
    private PublishedRepositoryInterface $publishedRepository;

    public function __construct(PublishedRepositoryInterface $publishedRepository)
    {
        $this->publishedRepository = $publishedRepository;
    }

    public function execute(AddPublicationRequest $request): AddPublicationResponse
    {
        $publication = new Published();

        $publication->description = $request->getDescription();
        $publication->link = $request->getLink();
        $publication->date = $request->getDate();

        $publication = $this->publishedRepository->savePublication($publication);

        return new AddPublicationResponse($publication);
    }
}
