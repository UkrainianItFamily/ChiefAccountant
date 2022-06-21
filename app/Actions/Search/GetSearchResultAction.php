<?php

declare(strict_types=1);

namespace App\Actions\Search;

use App\Constant\SearchConstant;
use App\Repositories\Search\SearchRepositoryInterface;

final class GetSearchResultAction
{
    private SearchRepositoryInterface $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function execute(GetSearchResultRequest $request): GetSearchResultResponse
    {
        $searchResult = $this->searchRepository->getSearchResult(
            $request->getSearchQuery(),
            SearchConstant::SEARCHING_TABLES_ARRAY
        );

        $searchResult->pagination = $searchResult
            ->appends(['search' => $request->getSearchQuery()])
            ->links('pagination::bootstrap-4');

        return new GetSearchResultResponse($searchResult);
    }
}
