<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function reports(): ?HasMany
    {
        return $this->hasMany(Report::class, 'category_id', 'id');
    }

    public function categories(): ?HasMany
    {
        return $this->hasMany(ReportCategory::class);
    }

    public function childrenCategories(): ?HasMany
    {
        return $this->hasMany(ReportCategory::class)->with('categories');
    }

    public function tags(): ?BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getParrentId(): ?int
    {
        return $this->report_category_id;
    }

    public function getUpdateAt(): ?Carbon
    {
        return $this->updated_at;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function getDeletedAt(): ?Carbon
    {
        return $this->deleted_at;
    }
}
