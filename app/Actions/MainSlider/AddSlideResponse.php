<?php

declare(strict_types=1);

namespace App\Actions\MainSlider;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\MainSlider;

final class AddSlideResponse implements ActionsResponseModelInterface
{
    private MainSlider $slide;

    public function __construct(MainSlider $slide)
    {
        $this->slide = $slide;
    }

    public function getResponse(): MainSlider
    {
        return $this->slide;
    }
}
