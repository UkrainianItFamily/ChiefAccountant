<?php

namespace App\Http\Controllers\Admin;

use App\Actions\MainSlider\AddSlideAction;
use App\Actions\MainSlider\AddSlideRequest;
use App\Actions\MainSlider\DeleteSlideAction;
use App\Actions\MainSlider\DeleteSlideRequest;
use App\Actions\MainSlider\GetAllSlidesByPaginationAction;
use App\Actions\MainSlider\GetAllSlidesByPaginationRequest;
use App\Actions\MainSlider\UpdateSlideAction;
use App\Actions\MainSlider\UpdateSlideRequest;
use App\Constant\MainSliderConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainSlider\CreateMainSliderValidateRequest;
use App\Http\Requests\MainSlider\UpdateMainSliderValidateRequest;

class AdminMainSliderController extends Controller
{
    public function getAllMainSlidesAdmin(GetAllSlidesByPaginationAction $action)
    {
        $slidesList = $action->execute(
            new GetAllSlidesByPaginationRequest(
                MainSliderConstant::ADMIN_PER_PAGE
            )
        )->getResponse();

        return view('pages.admin.mainSlider.slides-list-page', ['slidesList' => $slidesList]);
    }

    public function saveSlide(AddSlideAction $action, CreateMainSliderValidateRequest $request)
    {
        $slide = $action->execute(
            new AddSlideRequest(
                $request->input('title'),
                $request->input('description'),
                (int) $request->input('position'),
                $request->input('link'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllMainSliderSlides');
    }

    public function updateSlide(UpdateSlideAction $action, UpdateMainSliderValidateRequest $request)
    {
        $slide = $action->execute(
            new UpdateSlideRequest(
                (int) $request->input('id'),
                $request->input('title'),
                $request->input('description'),
                (int) $request->input('position'),
                $request->input('link'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllMainSliderSlides');
    }

    public function deleteSlide(DeleteSlideAction $action, string $id)
    {
        $action->execute(
            new DeleteSlideRequest(
                (int) $id
            )
        );

        return $this->successResponseRedirect('Удалено', 'admin.getAllMainSliderSlides');
    }
}
