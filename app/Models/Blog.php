<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_cover',
        'content',
        'slug',
        'category_id',
        'author',
    ];

    // Relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
