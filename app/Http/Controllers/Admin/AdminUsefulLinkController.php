<?php

namespace App\Http\Controllers\Admin;

use App\Actions\UsefulLink\AddUsefulLinkAction;
use App\Actions\UsefulLink\AddUsefulLinkRequest;
use App\Actions\UsefulLink\DeleteUsefulLinkAction;
use App\Actions\UsefulLink\DeleteUsefulLinkRequest;
use App\Actions\UsefulLink\GetAllUsefulLinksByPaginationAction;
use App\Actions\UsefulLink\UpdateUsefulLinkAction;
use App\Actions\UsefulLink\UpdateUsefulLinkRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsefulLink\CreateUsefulLinkValidateRequest;
use App\Http\Requests\UsefulLink\UpdateUsefulLinkValidateRequest;

class AdminUsefulLinkController extends Controller
{
    public function saveUsefulLink(CreateUsefulLinkValidateRequest $request, AddUsefulLinkAction $addUsefulLinkAction)
    {
        $news = $addUsefulLinkAction->execute(
            new AddUsefulLinkRequest(
                $request->input('title'),
                $request->input('link'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllUsefulLinks');
    }

    public function deleteUsefulLink(DeleteUsefulLinkAction $deleteUsefulLinkAction, string $id)
    {
        $deleteUsefulLinkAction->execute(
            new DeleteUsefulLinkRequest(
                (int) $id
            )
        );

        return back()
            ->with(['success'=> 'Удалено']);
    }

    public function updateUsefulLink(UpdateUsefulLinkAction $updateUsefulLinkAction, UpdateUsefulLinkValidateRequest $request)
    {
        $publication = $updateUsefulLinkAction->execute(
            new UpdateUsefulLinkRequest(
                (int) $request->input('id'),
                $request->input('title'),
                $request->input('link'),

            )
        )->getResponse();

        return back()
            ->with(['success'=> 'Успешно сохранено']);
    }

    public function getAllUsefulLinksAdmin(GetAllUsefulLinksByPaginationAction $getAllUsefulLinksByPaginationAction)
    {
        $usefulLinks = $getAllUsefulLinksByPaginationAction->execute()->getResponse();

        return view('pages.admin.usefulLink.usefulLinks-list-page', ['data' => $usefulLinks]);
    }
}
