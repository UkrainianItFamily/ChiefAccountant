<?php

namespace App\Http\Controllers\Admin;

use App\Actions\EntrepreneurialActivity\AddEntrepreneurialActivityAction;
use App\Actions\EntrepreneurialActivity\AddEntrepreneurialActivityRequest;
use App\Actions\EntrepreneurialActivity\DeleteEntrepreneurialActivityAction;
use App\Actions\EntrepreneurialActivity\DeleteEntrepreneurialActivityRequest;
use App\Actions\EntrepreneurialActivity\GetAllListEntrepreneurialActivityAction;
use App\Actions\EntrepreneurialActivity\GetEntrepreneurialActivityByIdAction;
use App\Actions\EntrepreneurialActivity\GetEntrepreneurialActivityByIdRequest;
use App\Actions\EntrepreneurialActivity\UpdateEntrepreneurialActivityAction;
use App\Actions\EntrepreneurialActivity\UpdateEntrepreneurialActivityRequest;
use App\Http\Requests\EntrepreneurialActivity\CreateEntrepreneurialActivityValidateRequest;
use App\Http\Requests\EntrepreneurialActivity\UpdateEntrepreneurialActivityValidateRequest;

class AdminEntrepreneurialActivityController
{
    public function getAllEntrepreneurialActivityPage(GetAllListEntrepreneurialActivityAction $action)
    {
        $data = $action->execute()->getResponse();

        return view('pages.admin.entrepreneurialActivity.entrepreneurial-activity-page', compact('data'));
    }

    public function saveEntrepreneurialActivity(CreateEntrepreneurialActivityValidateRequest $request, AddEntrepreneurialActivityAction $action)
    {
        $action->execute(new AddEntrepreneurialActivityRequest(
            $request->input('name'),
        ))->getResponse();

        return redirect()->back();
    }

    public function getEditEntrepreneurialActivityPage(GetEntrepreneurialActivityByIdAction $action, string $id)
    {
        $entrepreneurialActivity =  $action->execute(new GetEntrepreneurialActivityByIdRequest(
            (int) $id
          ))->getResponse();

        return view('pages.admin.entrepreneurialActivity.entrepreneurial-activity-edit-page', compact('entrepreneurialActivity'));
    }

    public function updateEntrepreneurialActivity(UpdateEntrepreneurialActivityAction $action, UpdateEntrepreneurialActivityValidateRequest $request)
    {
        $action->execute(new UpdateEntrepreneurialActivityRequest(
            $request->input('id'),
            $request->input('name')
        ))->getResponse();

        return redirect()->route('admin.getAllEntrepreneurialActivity');
    }

    public function deleteEntrepreneurialActivity(DeleteEntrepreneurialActivityAction $action, string $id)
    {
        $action->execute(new DeleteEntrepreneurialActivityRequest(
            (int) $id
        ));

        return redirect()->back()->with('message','Успешно удалено');
    }
}
