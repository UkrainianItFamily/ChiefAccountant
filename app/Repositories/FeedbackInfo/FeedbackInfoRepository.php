<?php

declare(strict_types=1);

namespace App\Repositories\FeedbackInfo;

use App\Models\FeedbackInfo;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class FeedbackInfoRepository extends BaseRepository implements FeedbackInfoRepositoryInterface
{
    public function createFeedbackInfo(FeedbackInfo $feedbackInfo): FeedbackInfo
    {
        $feedbackInfo->save();

        return $feedbackInfo;
    }

    public function updateFeedbackInfo(FeedbackInfo $feedbackInfo): FeedbackInfo
    {
        $feedbackInfo->update();

        return $feedbackInfo;
    }

    public function getFeedbackInfoById(int $id): ?FeedbackInfo
    {
        $getFeedbackInfoById = FeedbackInfo::find($id);

        return $getFeedbackInfoById;
    }

    public function getAllFeedbackList(): Collection
    {
        $getFeedbackInfo = FeedbackInfo::all();
        return $getFeedbackInfo;
    }

    public function deleteFeedbackInfo(int $id): void
    {
        FeedbackInfo::firstWhere('id', $id)->delete();
    }
}
