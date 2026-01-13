<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'location',
        'extra_services',
        'specifications',
        'car_features',
        'category_id'
    ];

    protected $casts = [
        'extra_services' => 'array',
        'specifications' => 'array',
        'car_features' => 'array',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'car_id');
    }
}
