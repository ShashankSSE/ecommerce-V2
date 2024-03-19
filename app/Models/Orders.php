<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    
    protected $table = 'orders'; 

    protected $fillable = [
        'unique_Id',
        'price',
        'name',
        'email',
        'mobile',
        'city',
        'state',
        'pin',
        'address',
        'payment_type',
        'payment_status',
        'reference_no',
        'transaction_id',
    ];
}
