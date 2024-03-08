<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faqs extends Model
{

    use HasFactory, SoftDeletes;
    
    protected $table = 'faqs'; 

    protected $fillable = ['question','answere','created_by','status'];

    protected $dates = ['deleted_at']; 
}
