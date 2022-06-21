<?php


namespace App\Repositories\Feedback;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;

interface FeedbackRepositoryInterface
{
    public function createFeedback(Feedback $feedback): Feedback;
    public function deleteFeedback(int $id): void;
    public function getAllFeedbackList():  Collection;
    public function showFeedbackById(int $id): Collection;
    public function getFeedbackPage(): Collection;
    public function getFeedbackHomeInfo(): Collection;
}
