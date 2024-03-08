<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'categories'; 

    protected $fillable = ['name','created_by','status'];

    protected $dates = ['deleted_at']; 

        /**
     * Get the subcategories associated with the category.
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
