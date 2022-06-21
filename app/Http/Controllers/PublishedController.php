<?php

namespace App\Http\Controllers;

use App\Actions\Published\GetPaginationPublishedAction;
use App\Actions\Published\GetPaginationPublishedRequest;

class PublishedController extends Controller
{
    public function getPaginationPublishesPage()
    {
        return view('pages.published.published-list-page');
    }

    public function getPaginationPublishes(GetPaginationPublishedAction $paginationPublishedAction, string $offset)
    {
        $publishes = $paginationPublishedAction->execute(
            new GetPaginationPublishedRequest(
                (int) $offset
            )
        )->getResponse();

        return response()->json($publishes);
    }
}
