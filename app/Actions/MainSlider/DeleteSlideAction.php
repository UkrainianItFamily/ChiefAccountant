<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Repositories\MainSlider\MainSliderRepositoryInterface;

final class DeleteSlideAction
{
    private MainSliderRepositoryInterface $mainSliderRepository;

    public function __construct(MainSliderRepositoryInterface $mainSliderRepository)
    {
        $this->mainSliderRepository = $mainSliderRepository;
    }

    public function execute(DeleteSlideRequest $request): void
    {
        $usefulLink = $this->mainSliderRepository->getSlideById($request->getId());

        $this->mainSliderRepository->deleteSlide($usefulLink);
    }
}
