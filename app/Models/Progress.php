<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'progress_level',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
