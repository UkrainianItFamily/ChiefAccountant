<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyRate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'usd_rate',
        'eur_rate',
        'rub_rate',
        'date',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsdRate(): float
    {
        return $this->usd_rate;
    }

    public function getRubRate(): float
    {
        return $this->rub_rate;
    }

    public function getEurRate(): float
    {
        return $this->eur_rate;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getDeletedAt(): ?Carbon
    {
        return $this->deleted_at;
    }
}
