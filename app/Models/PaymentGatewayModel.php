<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatewayModel extends Model
{
    use HasFactory;


    
    protected $table = 'payment_gateway'; 

    protected $fillable = [
        'payment_gateway',
        'key',
        'secret',
        'mode',
        'is_active', 
    ];
}
