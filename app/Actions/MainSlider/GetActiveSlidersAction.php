<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Repositories\MainSlider\MainSliderRepositoryInterface;

final class GetActiveSlidersAction
{
    private MainSliderRepositoryInterface $mainSliderRepository;

    public function __construct(MainSliderRepositoryInterface $mainSliderRepository)
    {
        $this->mainSliderRepository = $mainSliderRepository;
    }

    public function execute(): GetActiveSlidersResponse
    {
        $activeSliders = $this->mainSliderRepository->getActiveSliders();

        return new GetActiveSlidersResponse($activeSliders);
    }
}
