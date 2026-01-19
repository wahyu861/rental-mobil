<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'copyright_text',
        'footer_description'
    ];
}
