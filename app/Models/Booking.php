<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'province_name',
        'regency_id',
        'regency_name',
        'district_id',
        'district_name',
        'village_id',
        'village_name',
        'name',
        'address',
        'phone',
        'usage_date',
        'price',
        'user_id',
        'car_name',
        'car_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
