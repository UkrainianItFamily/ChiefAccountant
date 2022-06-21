<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'description',
        'category_id',
        'app_id',
    ];

    public function tags(): ?BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category(): ?BelongsTo
    {
        return $this->belongsTo(ReportCategory::class, 'category_id', 'id');
    }

    public function redactions(): ?HasMany
    {
        return $this->hasMany(ReportRedaction::class, 'report_id', 'id');
    }

    public function apps(): ?BelongsToMany
    {
        return $this->belongsToMany(App::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getUpdateDate(): ?Carbon
    {
        return $this->updated_at;
    }

    public function getCreatedDate(): ?Carbon
    {
        return $this->created_at;
    }

    public function getDeletedDate(): ?Carbon
    {
        return $this->deleted_at;
    }

    public function getAppId(): ?int
    {
        return $this->app_id;
    }
}
