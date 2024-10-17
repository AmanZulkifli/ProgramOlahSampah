<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'recycling_data_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recyclingData()
    {
        return $this->belongsTo(RecyclingData::class);
    }
}
