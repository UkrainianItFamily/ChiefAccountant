<?php

namespace App\Contracts;

use Illuminate\Pagination\Paginator;

interface ActionsResponseSimplePaginationInterface
{
    public function getResponse(): Paginator;
}
