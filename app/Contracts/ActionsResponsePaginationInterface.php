<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ActionsResponsePaginationInterface
{
    public function getResponse(): LengthAwarePaginator;
}
