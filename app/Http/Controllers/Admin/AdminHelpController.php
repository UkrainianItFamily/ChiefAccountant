<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Help\AddHelpAction;
use App\Actions\Help\AddHelpRequest;
use App\Actions\Help\GetAllHelpsAction;
use App\Actions\HelpCategories\GetAllHelpCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Help\CreateHelpValidateRequest;

class AdminHelpController extends Controller
{
    public function getAllHelpsPage(GetAllHelpsAction $allHelpsAction, GetAllHelpCategoriesAction $allHelpCategoriesAction)
    {
        $helps = $allHelpsAction->execute()->getResponse();
        $categories = $allHelpCategoriesAction->execute()->getResponse();

        return view('pages.admin.help.helps-list-page', ['data' => $helps, 'categories' => $categories]);
    }

    public function saveHelp(AddHelpAction $action, CreateHelpValidateRequest $request)
    {
        $help = $action->execute(
            new AddHelpRequest(
                $request->input('title'),
                $request->input('description'),
                $request->input('categoryId'),
            )
        )->getResponse();

        return $this->successResponseRedirect('Создано', 'admin.getAllHelps');
    }
}
