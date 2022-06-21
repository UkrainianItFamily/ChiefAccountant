<?php


namespace App\Repositories\Feedback;

use App\Models\Feedback;
use App\Models\FeedbackCategory;
use App\Models\FeedbackInfo;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{
    public function createFeedback(Feedback $feedback): Feedback
    {
        $feedback->save();

        return $feedback;
    }

    public function getAllFeedbackList(): Collection
    {
        $getAllFeedback = Feedback::all();

        return $getAllFeedback;
    }

    public function showFeedbackById(int $id): Collection
    {
        $getShowFeedback = Feedback::where('id', $id)->get();

        return $getShowFeedback;
    }

    public function getFeedbackPage(): Collection
    {
        $getFeedbackPage = FeedbackCategory::whereNull('parent_category_id')
            ->with('childrenCategories')
            ->get();

        return $getFeedbackPage;
    }

    public function getFeedbackHomeInfo(): Collection
    {
        $getFeedbackInfo = FeedbackInfo::all();
        return $getFeedbackInfo;
    }

    public function deleteFeedback(int $id): void
    {
        Feedback::firstWhere('id', $id)->delete();
    }
}
