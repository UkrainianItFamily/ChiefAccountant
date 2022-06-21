<?php

declare(strict_types=1);

namespace App\Actions\FeedbackQuestionSubCategory;


use App\Models\FeedbackCategory;
use App\Repositories\FeedbackQuestion\FeedbackQuestionRepositoryInterface;

final class AddFeedbackQuestionSubCategoryAction
{
    private FeedbackQuestionRepositoryInterface $feedbackQuestionRepository;

    public function __construct(FeedbackQuestionRepositoryInterface  $feedbackQuestionRepository) {

        $this->feedbackQuestionRepository = $feedbackQuestionRepository;
    }

    public function execute(AddFeedbackQuestionSubCategoryRequest $request): AddFeedbackQuestionSubCategoryResponse
    {
        $feedbackSubCategory = new FeedbackCategory();
        $feedbackSubCategory->parent_category_id = $request->getCategoryId();
        $feedbackSubCategory->title = $request->getTitle();

        $feedbackSubCategory = $this->feedbackQuestionRepository->createFeedbackCategory($feedbackSubCategory);

        return new AddFeedbackQuestionSubCategoryResponse($feedbackSubCategory);
    }
}
