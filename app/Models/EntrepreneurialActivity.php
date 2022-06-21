<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepreneurialActivity extends Model
{
    use HasFactory;

    protected $table = 'entrepreneurial_activity';

    public function user()
    {
        return $this->hasMany(User::class, 'entrepreneurial_activity_id');
    }
}
