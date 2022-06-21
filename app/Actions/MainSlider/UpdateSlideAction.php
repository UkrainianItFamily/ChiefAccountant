<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Repositories\MainSlider\MainSliderRepositoryInterface;

final class UpdateSlideAction
{
    private MainSliderRepositoryInterface $mainSliderRepository;

    public function __construct(MainSliderRepositoryInterface $mainSliderRepository)
    {
        $this->mainSliderRepository = $mainSliderRepository;
    }

    public function execute(UpdateSlideRequest $request): UpdateSlideResponse
    {
        $updateSlide = $this->mainSliderRepository->getSlideById($request->getId());

        $updateSlide->title = $request->getTitle();
        $updateSlide->description = $request->getDescription();
        $updateSlide->position = $request->getPosition();
        $updateSlide->link = $request->getLink();

        $this->mainSliderRepository->updateSlide($updateSlide);

        return new UpdateSlideResponse($updateSlide);
    }
}
