<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShipRocketController extends Controller
{
    public function index(){
        $this->getToken();        
    }

    public function getToken(){
        $shiprocketEmailId  =   "anisha.srivastava60@gmail.com";
 
        $shiprocketPassword =   "anisha.Srivastava60";
 
        $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
 
            'header' => 'Content-Type: application/json',

            'email' => $shiprocketEmailId,

            'password' => $shiprocketPassword,

        ]);
        $token =   $response->json()['token'];
        dd($token);
        // Some test code here. Some more test here
 
        // if(ShipRocket::all()->last() == null){
 
        //         $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
 
        //         'header' => 'Content-Type: application/json',
 
        //         'email' => $shiprocketEmailId,
 
        //         'password' => $shiprocketPassword,
 
        //     ]);
 
        //     $token  =   $response->json()['token'];
 
 
        //     // Save record into the table
 
        //     $shiprocketToken                =   new ShipRocket();
 
        //     $shiprocketToken->token         =   $token;
 
        //     $shiprocketToken->save();
 
        // }
 
        // else{
 
        //     $timeNow            =   Carbon::now(new \DateTimeZone('Asia/Kolkata'));
 
        //     $lastTokenTime      =   Carbon::parse(ShipRocket::all()->last()->updated_at->jsonSerialize())->timezone('Asia/Kolkata')->format('Y-m-d H:i:s');
 
 
        //     $hoursDifference    =   $timeNow->diffInHours($lastTokenTime);
 
 
        //     $token              =   null;
 
 
        //     if($hoursDifference > 23){
 
        //         // Create new token if token more than a day old
 
        //         $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
 
        //             'header' => 'Content-Type: application/json',
 
        //             'email' => $shiprocketEmailId,
 
        //             'password' => $shiprocketPassword,
 
        //         ]);
 
        //         $token  =   $response->json()['token'];
 
        //         // Save record into the table
 
        //         $shiprocketToken                =   new ShipRocket();
 
        //         $shiprocketToken->token         =   $token;
 
        //         $shiprocketToken->save();
 
        //     }
 
        //     else{
 
        //         // Get current token
 
        //         $token      =   ShipRocket::all()->last()->token;
 
        //     }
 
        // }
 
        // return $token;
    }
}
