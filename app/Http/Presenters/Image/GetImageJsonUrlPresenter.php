<?php

namespace App\Http\Presenters\Image;

use App\Contracts\PresenterJsonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class GetImageJsonUrlPresenter implements PresenterJsonInterface
{
    public function presentJson(Model $image): JsonResponse
    {
        return response()->json([
            'url' => $image->getUrl()
        ]);
    }
}
