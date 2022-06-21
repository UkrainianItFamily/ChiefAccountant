<?php

declare(strict_types=1);

namespace App\Repositories\MainSlider;

use App\Constant\MainSliderConstant;
use App\Models\MainSlider;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MainSliderRepository extends BaseRepository implements MainSliderRepositoryInterface
{
    public function saveSlide(MainSlider $slide): MainSlider
    {
        $slide->save();

        return $slide;
    }

    public function updateSlide(MainSlider $slide): MainSlider
    {
        $slide->update();

        return $slide;
    }

    public function getSlideById(int $id): ?MainSlider
    {
        $slide = MainSlider::find($id);

        return $slide;
    }

    public function deleteSlide(MainSlider $slide): void
    {
        $slide->delete();
    }

    public function getAllSlidesByPaginate(int $perPage): ?LengthAwarePaginator
    {
        $sliders = MainSlider::orderBy('created_at', 'desc')->paginate($perPage);

        return $sliders;
    }

    public function getActiveSliders(): Collection
    {
        $sliders = MainSlider::orderBy('position', 'asc')->where('position', '!=', MainSliderConstant::HIDDEN_POSITION)->get();

        return $sliders;
    }
}
