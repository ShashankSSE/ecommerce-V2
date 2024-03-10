<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function pushOrder($id){
    // $getResults = Order::pushOrder($id);

    
    return response()->json(['status'=>$getResults]);
   }
}
