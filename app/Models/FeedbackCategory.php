<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeedbackCategory extends Model
{
    use HasFactory;

    protected $table = 'feedback_categories';
    protected $fillable = [
        'title',
        'parent_category_id'
    ];

    public function categories(): ?HasMany
    {
        return $this->hasMany(FeedbackCategory::class, 'parent_category_id', 'id');
    }

    public function title(): ?HasMany
    {
        return $this->hasMany(Feedback::class, 'question_topic_id', 'id');
    }

    public function childrenCategories(): ?HasMany
    {
        return $this->hasMany(FeedbackCategory::class, 'parent_category_id')->with('categories');
    }

    public function getTitle():string
    {
        return $this->title;
    }
}
