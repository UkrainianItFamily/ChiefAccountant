<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\MainSlider;

final class UpdateSlideResponse implements ActionsResponseModelInterface
{
    private MainSlider $updatedSlide;

    public function __construct(MainSlider $updatedSlide)
    {
        $this->updatedSlide = $updatedSlide;
    }

    public function getResponse(): MainSlider
    {
        return $this->updatedSlide;
    }
}
