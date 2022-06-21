<?php

namespace App\Actions\UploadImage;

use App\Models\Image;
use App\Repositories\Image\ImageRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

final class UploadImageAction
{
    private ImageRepositoryInterface $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function execute(UploadImageRequest $request): UploadImageResponse
    {
        $image = new Image();

        $date = Carbon::now()->format('d-m-Y');
        $image->path = Storage::putFile('public/images/'.$date, $request->getImage());
        $image->url = Storage::url($image->getPath());

        $this->imageRepository->saveImage($image);

        return new UploadImageResponse($image);
    }
}
