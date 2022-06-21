<?php

declare(strict_types=1);

namespace App\Repositories\FeedbackQuestion;

use App\Models\FeedbackCategory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;


class FeedbackQuestionRepository extends BaseRepository implements FeedbackQuestionRepositoryInterface
{
    public function createFeedbackCategory(FeedbackCategory $feedbackCategory): FeedbackCategory
    {
       $feedbackCategory->save();

       return  $feedbackCategory;
    }

    public function showFeedbackCategoryById($id): Collection
    {
          $showFeedbackSubCategory = FeedbackCategory::where('parent_category_id', $id)->get();

          return $showFeedbackSubCategory;
    }

   public function updateFeedbackCategory(FeedbackCategory $feedbackCategory): FeedbackCategory
    {
        $feedbackCategory->update();

        return $feedbackCategory;
    }

   public function getFeedbackCategoryById(int $id): ?FeedbackCategory
    {

        $getFeedbackById = FeedbackCategory::find($id);

        return $getFeedbackById;
    }

    public function getParentsFeedbackCategoryById(): Collection
    {
        $getParentsFeedbackById = FeedbackCategory::where('parent_category_id', NULL)->get();

        return $getParentsFeedbackById;
    }

    public function deleteFeedbackCategory(int $id): void
    {
        FeedbackCategory::firstWhere('id', $id)->delete();
    }
}
