<?php

namespace App\Actions\UploadImage;

use Illuminate\Http\UploadedFile;

class UploadImageRequest
{
    private UploadedFile $image;

    public function __construct(UploadedFile $image)
    {
        $this->image = $image;
    }

    public function getImage(): UploadedFile
    {
        return $this->image;
    }
}
