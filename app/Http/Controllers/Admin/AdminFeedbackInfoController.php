<?php


namespace App\Http\Controllers\Admin;

use App\Actions\FeedbackInfo\AddFeedbackInfoAction;
use App\Actions\FeedbackInfo\AddFeedbackInfoRequest;
use App\Actions\FeedbackInfo\DeleteFeedbackInfoAction;
use App\Actions\FeedbackInfo\DeleteFeedbackInfoRequest;
use App\Actions\FeedbackInfo\GetAllFeedbackInfoListAction;
use App\Actions\FeedbackInfo\GetEditFeedbackInfoAction;
use App\Actions\FeedbackInfo\GetEditFeedbackInfoRequest;
use App\Actions\FeedbackInfo\UpdateFeedbackInfoAction;
use App\Actions\FeedbackInfo\UpdateFeedbackInfoRequest;
use App\Http\Requests\Feedback\CreateFeedbackInfoValidateRequest;
use App\Http\Requests\Feedback\UpdateFeedbackInfoValidateRequest;

class AdminFeedbackInfoController
{
    public function getAllFeedbackInfo(GetAllFeedbackInfoListAction $getAllFeedbackInfoListAction)
    {
        $getAllFeedbackInfo = $getAllFeedbackInfoListAction->execute()->getResponse();

        return view('pages.admin.contacts.contact-info', compact('getAllFeedbackInfo'));
    }

    public function createFeedbackInfo(CreateFeedbackInfoValidateRequest $request, AddFeedbackInfoAction $addFeedbackInfoAction)
    {
        $createFeedbackInfo = $addFeedbackInfoAction->execute( new AddFeedbackInfoRequest($request->input('description')))->getResponse();

        return redirect()->route('admin.contacts.getAllFeedbackInfo');
    }

    public function editFeedbackInfo(GetEditFeedbackInfoAction $getEditFeedbackInfoAction, string $id)
    {
        $editFeedbackInfo = $getEditFeedbackInfoAction->execute(new GetEditFeedbackInfoRequest((int)$id))->getResponse();

        return view('pages.admin.contacts.contact-info-edit', compact('editFeedbackInfo'));
    }

    public function updateFeedbackInfo(UpdateFeedbackInfoValidateRequest $request, UpdateFeedbackInfoAction $updateFeedbackInfoAction)
    {
        $updateFeedbackInfo = $updateFeedbackInfoAction->execute(
            new UpdateFeedbackInfoRequest(
                $request->input('feedback_id'),
                $request->input('description'),
            )
        )->getResponse();

        return redirect()->route('admin.contacts.getAllFeedbackInfo')->with('success','Успешно');
    }

    public function deleteFeedbackInfo(DeleteFeedbackInfoAction $deleteFeedbackInfoAction, string $id)
    {
        $deleteFeedbackInfoAction->execute(
            new DeleteFeedbackInfoRequest(
                (int)$id
            )
        );
        return redirect()->route('admin.contacts.getAllFeedbackInfo');
    }
}
