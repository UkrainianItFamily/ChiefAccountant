<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Contracts\ActionsResponseCollectionInterface;
use Illuminate\Database\Eloquent\Collection;

final class GetActiveSlidersResponse implements ActionsResponseCollectionInterface
{
    private Collection $activeSlides;

    public function __construct(Collection $activeSlides)
    {
        $this->activeSlides = $activeSlides;
    }

    public function getResponse(): Collection
    {
        return $this->activeSlides;
    }
}
