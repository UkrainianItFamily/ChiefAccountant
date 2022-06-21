<?php

declare(strict_types=1);

namespace App\Repositories\MainSlider;

use App\Models\MainSlider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface MainSliderRepositoryInterface
{
    public function saveSlide(MainSlider $slide): MainSlider;

    public function updateSlide(MainSlider $slide): MainSlider;

    public function getSlideById(int $id): ?MainSlider;

    public function deleteSlide(MainSlider $slide): void;

    public function getAllSlidesByPaginate(int $perPage): ?LengthAwarePaginator;

    public function getActiveSliders(): Collection;
}
