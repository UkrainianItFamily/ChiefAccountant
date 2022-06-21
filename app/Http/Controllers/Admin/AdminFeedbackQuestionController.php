<?php


namespace App\Http\Controllers\Admin;

use App\Actions\FeedbackQuestion\AddFeedbackQuestionAction;
use App\Actions\FeedbackQuestion\AddFeedbackQuestionRequest;
use App\Actions\FeedbackQuestion\DeleteFeedbackQuestionAction;
use App\Actions\FeedbackQuestion\DeleteFeedbackQuestionRequest;
use App\Actions\FeedbackQuestion\GetEditFeedbackQuestionAction;
use App\Actions\FeedbackQuestion\GetEditFeedbackQuestionRequest;
use App\Actions\FeedbackQuestion\GetParentsCategoryByIdAction;
use App\Actions\FeedbackQuestion\GetShowFeedbackQuestionByIdAction;
use App\Actions\FeedbackQuestion\GetShowFeedbackQuestionByIdRequest;
use App\Actions\FeedbackQuestion\UpdateFeedbackQuestionAction;
use App\Actions\FeedbackQuestion\UpdateFeedbackQuestionRequest;
use App\Actions\FeedbackQuestionSubCategory\AddFeedbackQuestionSubCategoryAction;
use App\Actions\FeedbackQuestionSubCategory\AddFeedbackQuestionSubCategoryRequest;
use App\Actions\FeedbackQuestionSubCategory\DeleteFeedbackQuestionSubCategoryAction;
use App\Actions\FeedbackQuestionSubCategory\DeleteFeedbackQuestionSubCategoryRequest;
use App\Actions\FeedbackQuestionSubCategory\GetEditFeedbackQuestionSubCategoryAction;
use App\Actions\FeedbackQuestionSubCategory\GetEditFeedbackQuestionSubCategoryRequest;
use App\Actions\FeedbackQuestionSubCategory\UpdateFeedbackQuestionSubCategoryAction;
use App\Actions\FeedbackQuestionSubCategory\UpdateFeedbackQuestionSubCategoryRequest;
use App\Http\Requests\Feedback\CreateFeedbackQuestionValidateRequest;
use App\Http\Requests\Feedback\CreateFeedbackSubQuestionValidateRequest;
use App\Http\Requests\Feedback\UpdateFeedbackQuestionValidateRequest;

class AdminFeedbackQuestionController
{
    public function getParentsCategoryById(GetParentsCategoryByIdAction $getParentsCategoryByIdAction)
    {
        $getParentsCategoryById =  $getParentsCategoryByIdAction->execute()->getResponse();

        return view('pages.admin.contacts.contacts-question.contact-question-index', compact('getParentsCategoryById'));
    }

    public function showFeedbackQuestion(GetShowFeedbackQuestionByIdAction $showFeedbackQuestionByIdAction, string $id)
    {
        $showFeedbackQuestion = $showFeedbackQuestionByIdAction->execute(new GetShowFeedbackQuestionByIdRequest((int)$id))->getResponse();

        return view('pages.admin.contacts.contacts-question.contact-question-show', compact('showFeedbackQuestion', 'id'));
    }

    public function createFeedbackQuestion(CreateFeedbackQuestionValidateRequest $request, AddFeedbackQuestionAction $addFeedbackQuestionAction)
    {
        $createFeedbackQuestion =  $addFeedbackQuestionAction->execute( new AddFeedbackQuestionRequest($request->input('title')))->getResponse();

        return redirect()->route('admin.contacts.question');
    }

    public function editFeedbackQuestion(GetEditFeedbackQuestionAction $getEditFeedbackQuestionAction, string $id)
    {
        $editFeedbackQuestion = $getEditFeedbackQuestionAction->execute( new GetEditFeedbackQuestionRequest((int)$id))->getResponse();

        return view('pages.admin.contacts.contacts-question.contact-question-edit', compact('editFeedbackQuestion'));
    }

    public function updateFeedbackQuestion(UpdateFeedbackQuestionValidateRequest $request, UpdateFeedbackQuestionAction $updateFeedbackQuestionAction)
    {
        $updateFeedbackQuestion = $updateFeedbackQuestionAction->execute(
            new UpdateFeedbackQuestionRequest(
                $request->input('id'),
                $request->input('title'),
            )
        )->getResponse();

        return redirect()->route('admin.contacts.question')->with('success','Успешно');

    }

    public function deleteFeedbackQuestion(DeleteFeedbackQuestionAction $deleteFeedbackQuestionAction, string $id)
    {
        $deleteFeedbackQuestionAction->execute(
            new DeleteFeedbackQuestionRequest(
                (int)$id
            )
        );

        return redirect()->route('admin.contacts.question');
    }

    public function createSubCategory(CreateFeedbackSubQuestionValidateRequest $request, AddFeedbackQuestionSubCategoryAction $feedbackQuestionSubCategoryAction)
    {
        $createFeedbackSubCategory =  $feedbackQuestionSubCategoryAction
            ->execute( new AddFeedbackQuestionSubCategoryRequest(
                $request->input('parent_category_id'),
                $request->input('title')
            ))->getResponse();

        return redirect()->route('admin.contacts.question');
    }

    public function editSubCategory(GetEditFeedbackQuestionSubCategoryAction $getEditFeedbackQuestionSubCategoryAction, string $id)
    {
        $editFeedbackSubCategory = $getEditFeedbackQuestionSubCategoryAction->execute(new GetEditFeedbackQuestionSubCategoryRequest((int)$id))->getResponse();

        return view('pages.admin.contacts.contacts-question.contact-question-subcategory-edit', compact('editFeedbackSubCategory'));
    }

    public function updateSubCategory(UpdateFeedbackQuestionValidateRequest $request, UpdateFeedbackQuestionSubCategoryAction $updateFeedbackQuestionSubCategoryAction)
    {
        $updateFeedbackQuestionSubCategory = $updateFeedbackQuestionSubCategoryAction->execute(
            new UpdateFeedbackQuestionSubCategoryRequest(
                $request->input('id'),
                $request->input('title'),
            )
        )->getResponse();

        return redirect()->route('admin.contacts.question')->with('success','Успешно');
    }

    public function deleteSubCategory(DeleteFeedbackQuestionSubCategoryAction $deleteFeedbackQuestionSubCategoryAction, string $id)
    {
        $deleteFeedbackQuestionSubCategoryAction->execute(
            new DeleteFeedbackQuestionSubCategoryRequest(
                (int)$id
            )
        );
        return redirect()->route('admin.contacts.question');
    }
}
