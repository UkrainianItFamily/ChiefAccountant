<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

interface PresenterJsonInterface
{
    public function presentJson(Model $model): JsonResponse;
}
