<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'car_id',
        'car_price',
        'province',
        'regency',
        'district',
        'village',
        'pickup_location',
        'pickup_date'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
