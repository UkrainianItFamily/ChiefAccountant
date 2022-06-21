<?php

declare(strict_types=1);

namespace App\Actions\Published;

use App\Repositories\Published\PublishedRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class GetPublicationByIdAction
{
    private PublishedRepositoryInterface $publishedRepository;

    public function __construct(PublishedRepositoryInterface $publishedRepository)
    {
        $this->publishedRepository = $publishedRepository;
    }

    public function execute(GetPublicationByIdRequest $request): GetPublicationByIdResponse
    {
        $publication = $this->publishedRepository->getPublishedById($request->getId());

        if (!$publication) {
            throw new ModelNotFoundException();
        }

        return new GetPublicationByIdResponse($publication);
    }
}
