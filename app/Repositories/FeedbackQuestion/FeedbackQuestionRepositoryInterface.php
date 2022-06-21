<?php

declare(strict_types=1);

namespace App\Repositories\FeedbackQuestion;

use App\Models\FeedbackCategory;
use Illuminate\Database\Eloquent\Collection;

interface FeedbackQuestionRepositoryInterface
{
    public function createFeedbackCategory(FeedbackCategory $feedbackCategory):FeedbackCategory;
    public function showFeedbackCategoryById($id): Collection;
    public function updateFeedbackCategory(FeedbackCategory $feedbackCategory): FeedbackCategory;
    public function deleteFeedbackCategory(int $id): void;
    public function getFeedbackCategoryById(int $id): ?FeedbackCategory;
    public function getParentsFeedbackCategoryById(): Collection;
}
