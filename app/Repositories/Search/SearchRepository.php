<?php

declare(strict_types=1);

namespace App\Repositories\Search;

use App\Constant\SearchConstant;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchRepository extends BaseRepository implements SearchRepositoryInterface
{
    public function getSearchResult(string $searchQuery, array $searchingTablesArray): LengthAwarePaginator
    {
        $results = Search::addMany($searchingTablesArray)->beginWithWildcard()->orderByDesc()->paginate(SearchConstant::RESULT_PER_PAGE)->get($searchQuery);

        return $results;
    }
}
