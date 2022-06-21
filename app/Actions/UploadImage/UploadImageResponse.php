<?php

declare(strict_types=1);

namespace App\Actions\UploadImage;

use App\Contracts\ActionsResponseModelInterface;
use App\Models\Image;

final class UploadImageResponse implements ActionsResponseModelInterface
{
    private Image $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function getResponse(): Image
    {
        return $this->image;
    }
}
