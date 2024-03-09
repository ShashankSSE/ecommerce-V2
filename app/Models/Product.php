<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'products'; 

    protected $fillable = [
        'name',
        'shortDesc',
        'desc',
        'category',
        'sub_category',
        'slug',
        'metaTitle',
        'metaDesc',
        'is_featured',
        'is_flash_sale',
        'is_active',
        'sizeArray',
        'weightArray',
        'unitArray',
        'colorArray',
        'featured_image',
        'created_by',
    ];
}
