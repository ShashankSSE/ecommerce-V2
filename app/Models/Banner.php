<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'banner'; 

    protected $fillable = ['title','text','url','image','sequence','status'];

    protected $dates = ['deleted_at']; 

}
