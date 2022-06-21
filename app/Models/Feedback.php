<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback_form';
    protected $fillable =
        [
            'name',
            'email',
            'phone',
            'question_topic_id',
            'description'
        ];

    public function categories(): ?HasOne
    {
        return $this->hasOne(FeedbackCategory::class, 'id', 'question_topic_id');
    }

    public function getId(): int
    {
       return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function getPhone():string
    {
        return $this->phone;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
