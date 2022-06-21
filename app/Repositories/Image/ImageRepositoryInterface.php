<?php

declare(strict_types=1);

namespace App\Repositories\Image;

use App\Models\Image;

interface ImageRepositoryInterface
{
    public function saveImage(Image $image): Image;
}
