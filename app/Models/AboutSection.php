<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'main_description',
        'main_image',
        'sections'
    ];

    protected $casts = [
        'sections' => 'array',  // Laravel akan mengonversi JSON menjadi array otomatis
    ];
}
