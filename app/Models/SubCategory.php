<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'sub_category'; 

    protected $fillable = ['title','slug','category_id','created_by','status'];

    protected $dates = ['deleted_at']; 

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
