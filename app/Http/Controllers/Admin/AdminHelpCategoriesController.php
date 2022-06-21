<?php

namespace App\Http\Controllers\Admin;

use App\Actions\HelpCategories\AddHelpCategoryAction;
use App\Actions\HelpCategories\AddHelpCategoryRequest;
use App\Actions\HelpCategories\GetAllHelpCategoriesAction;
use App\Actions\HelpCategories\UpdateHelpCategoryAction;
use App\Actions\HelpCategories\UpdateHelpCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\HelpCategories\CreateHelpCategoryValidateRequest;
use App\Http\Requests\HelpCategories\UpdateHelpCategoryValidateRequest;

class AdminHelpCategoriesController extends Controller
{
    public function getAllHelpCategoriesPage(GetAllHelpCategoriesAction $action)
    {
        $categories = $action->execute()->getResponse();

        return view('pages.admin.help.helpCategories-list-page', ['data' => $categories]);
    }

    public function saveHelpCategory(AddHelpCategoryAction $action, CreateHelpCategoryValidateRequest $request)
    {
        $category = $action->execute(
            new AddHelpCategoryRequest(
                $request->input('title')
            )
        )->getResponse();

        return $this->successResponseRedirect('Сохранено', 'admin.getAllHelpCategories');
    }

    public function updateHelpCategory(UpdateHelpCategoryAction $action, UpdateHelpCategoryValidateRequest $request)
    {
        $category = $action->execute(
            new UpdateHelpCategoryRequest(
                (int) $request->input('id'),
                $request->input('title'),
                $request->input('slug')
            )
        )->getResponse();

        return $this->successResponseRedirect('Сохранено', 'admin.getAllHelpCategories');
    }
}
