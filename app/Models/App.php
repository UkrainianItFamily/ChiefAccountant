<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class App extends Model
{
    use HasFactory;

    public function reports(): ?BelongsToMany
    {
        return $this->belongsToMany(Report::class);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
