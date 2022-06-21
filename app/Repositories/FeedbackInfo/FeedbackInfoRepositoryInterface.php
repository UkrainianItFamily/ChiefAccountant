<?php

declare(strict_types=1);

namespace App\Repositories\FeedbackInfo;

use App\Models\FeedbackInfo;
use Illuminate\Database\Eloquent\Collection;

interface FeedbackInfoRepositoryInterface
{
    public function createFeedbackInfo(FeedbackInfo $feedbackInfo): FeedbackInfo;
    public function updateFeedbackInfo(FeedbackInfo $feedbackInfo): FeedbackInfo;
    public function deleteFeedbackInfo(int $id): void;
    public function getFeedbackInfoById(int $id): ?FeedbackInfo;
    public function getAllFeedbackList(): Collection;
}
