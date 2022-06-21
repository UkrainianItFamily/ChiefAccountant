<?php

namespace App\Http\Controllers\Admin;

use App\Actions\UploadImage\UploadImageAction;
use App\Actions\UploadImage\UploadImageRequest;
use App\Http\Controllers\Controller;
use App\Http\Presenters\Image\GetImageJsonUrlPresenter;
use Illuminate\Http\Request;

class AdminImageController extends Controller
{
   public function saveImage(UploadImageAction $action, Request $request, GetImageJsonUrlPresenter $presenter)
   {
       $image = $action->execute(
           new UploadImageRequest(
               $request->file('upload')
           )
       )->getResponse();

       return $presenter->presentJson($image);
   }
}
