<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Published\AddPublicationAction;
use App\Actions\Published\AddPublicationRequest;
use App\Actions\Published\DeletePublishedAction;
use App\Actions\Published\DeletePublishedRequest;
use App\Actions\Published\GetAdminPaginationPublishedAction;
use App\Actions\Published\GetAdminPaginationPublishedRequest;
use App\Actions\Published\GetPublicationByIdAction;
use App\Actions\Published\GetPublicationByIdRequest;
use App\Actions\Published\UpdatePublicationAction;
use App\Actions\Published\UpdatePublicationRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Published\CreatePublicationValidateRequest;
use App\Http\Requests\Published\UpdatePublicationValidateRequest;

class AdminPublishedController extends Controller
{
    public function getAllPublishedPage()
    {
        return view('pages.admin.published.published-list-page');
    }

    public function getPaginationPublishes(GetAdminPaginationPublishedAction $paginationPublishedAction, string $offset)
    {
        $publishes = $paginationPublishedAction->execute(
            new GetAdminPaginationPublishedRequest((int) $offset)
        )->getResponse();

        return response()->json($publishes);
    }

    public function deletePublished(DeletePublishedAction $deletePublishedAction, string $id)
    {
        $deletePublishedAction->execute(
            new DeletePublishedRequest(
                (int) $id
            )
        );
    }

    public function getPublicationEditPage(GetPublicationByIdAction $getPublicationByIdAction, string $id)
    {
        $publication = $getPublicationByIdAction->execute(
            new GetPublicationByIdRequest(
                (int) $id
            )
        )->getResponse();

        return view('pages.admin.published.published-edit-page', ['data' => $publication]);
    }

    public function updatePublication(UpdatePublicationAction $updatePublicationAction, UpdatePublicationValidateRequest $request, string $id)
    {
        $publication = $updatePublicationAction->execute(
            new UpdatePublicationRequest(
                (int) $id,
                $request->input('description'),
                $request->input('link'),
                $request->input('date'),

            )
        )->getResponse();

        return back()
            ->with(['success'=> 'Успешно сохранено']);
    }

    public function getPublicationCreatePage()
    {
        return view('pages.admin.published.published-create-page');
    }

    public function savePublication(CreatePublicationValidateRequest $request, AddPublicationAction $addPublicationAction)
    {
        $news = $addPublicationAction->execute(
            new AddPublicationRequest(
                $request->input('description'),
                $request->input('link'),
                $request->input('date'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Успешно сохранено', 'admin.getAllPublishes');
    }
}
