<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings'; 

    protected $fillable = [
        'header_logo',
        'favicon',
        'footer_logo',
        'meta_title',
        'short_description',
        'meta_keyword',
        'meta_description',
        'mobile',
        'email',
        'address',
        'social_media',
        'unitArray',
        'credits',
    ];
}
