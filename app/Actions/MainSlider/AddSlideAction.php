<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Models\MainSlider;
use App\Repositories\MainSlider\MainSliderRepositoryInterface;

final class AddSlideAction
{
    private MainSliderRepositoryInterface $mainSlideRepository;

    public function __construct(MainSliderRepositoryInterface $mainSlideRepository)
    {
        $this->mainSlideRepository = $mainSlideRepository;
    }

    public function execute(AddSlideRequest $request): AddSlideResponse
    {
        $slide = new MainSlider();

        $slide->title = $request->getTitle();
        $slide->description = $request->getDescription();
        $slide->position = $request->getPosition();
        $slide->link = $request->getLink();


        $slide = $this->mainSlideRepository->saveSlide($slide);

        return new AddSlideResponse($slide);
    }
}
