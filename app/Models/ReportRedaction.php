<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportRedaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'date',
        'text',
        'report_id',
    ];

    public function report(): ?BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getReportId(): int
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
}
