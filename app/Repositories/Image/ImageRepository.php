<?php

declare(strict_types=1);

namespace App\Repositories\Image;

use App\Models\Image;
use App\Repositories\BaseRepository;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    public function saveImage(Image $image): Image
    {
        $image->save();

        return $image;
    }
}
