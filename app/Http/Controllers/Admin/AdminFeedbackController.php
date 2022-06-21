<?php


namespace App\Http\Controllers\Admin;

use App\Actions\Feedback\DeleteFeedbackAction;
use App\Actions\Feedback\DeleteFeedbackRequest;
use App\Actions\Feedback\GetAllFeedbackListAction;
use App\Actions\Feedback\GetShowFeedbackByIdAction;
use App\Actions\Feedback\GetShowFeedbackByIdRequest;
use App\Http\Presenters\Feedback\GetFeedbackAsArrayPresenter;

class AdminFeedbackController
{
    public function getAllFeedbackPage(GetAllFeedbackListAction $getAllFeedbackListAction, GetFeedbackAsArrayPresenter $presenter)
    {
        $getAllFeedback = $getAllFeedbackListAction->execute()->getResponse();

        return view('pages.admin.contacts.contact-list', ['getAllFeedback' => $presenter->presentCollection($getAllFeedback)]);
    }

    public function showFeedback(GetShowFeedbackByIdAction $getShowFeedbackByIdAction, GetFeedbackAsArrayPresenter $presenter, string $id)
    {
        $showFeedback = $getShowFeedbackByIdAction->execute(new GetShowFeedbackByIdRequest((int)$id))->getResponse();

        return view('pages.admin.contacts.contact-show', ['showFeedback' => $presenter->presentCollection($showFeedback)]);
    }

    public function deleteFeedback(DeleteFeedbackAction $deleteFeedbackAction, string $id)
    {
        $deleteFeedbackAction->execute( new DeleteFeedbackRequest( (int)$id));

        return redirect()->route('admin.contacts.getAllFeedbackPage');
    }
}
