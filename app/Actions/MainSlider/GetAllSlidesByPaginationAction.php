<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Repositories\MainSlider\MainSliderRepositoryInterface;

final class GetAllSlidesByPaginationAction
{
    private MainSliderRepositoryInterface $mainSliderRepository;

    public function __construct(MainSliderRepositoryInterface $mainSliderRepository)
    {
        $this->mainSliderRepository = $mainSliderRepository;
    }

    public function execute(GetAllSlidesByPaginationRequest $request): GetAllSlidesByPaginationResponse
    {
        $slides = $this->mainSliderRepository->getAllSlidesByPaginate($request->getPerPage());

        return new GetAllSlidesByPaginationResponse($slides);
    }
}
