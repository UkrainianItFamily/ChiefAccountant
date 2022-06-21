<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Contracts\ActionsResponsePaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAllSlidesByPaginationResponse implements ActionsResponsePaginationInterface
{
    private LengthAwarePaginator $slides;

    public function __construct(LengthAwarePaginator $slides)
    {
        $this->slides = $slides;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->slides;
    }
}
