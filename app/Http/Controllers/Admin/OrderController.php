<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use App\Models\Settings;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index(Request $request){
        // dd(); 

        $settings = Settings::findOrFail(1);
        $length = 10;
        $randomString = Str::random($length);
        $recieptString = Str::random($length);

        $api_key = 'rzp_test_yrUhuJdTvCIkZ5';
        $api_secret = 'OneqyQ6JIUZPksc1QUyiKDMS';
        $razorApi = new Api($api_key, $api_secret);

        $order = [ 
            'receipt'  => "reciept_".$recieptString,
            'amount' => intval($request->amount) * 100,
            'currency' => 'INR'
        ]; 

        $details = [
            "key" => $api_key,
            "currency" => "INR",
            "name" => $request->name,
            "email" => $request->email,
            "contact" => "6395777952",
            "logo" => asset('images/site/' . $settings->header_logo),
        ];


        
        $razorpayOrder = $razorApi->order->create($order);



        $makeOrder = new Orders();
        
        $makeOrder->unique_Id = $razorpayOrder->id;
        $makeOrder->price = $razorpayOrder->amount;
        $makeOrder->name = $request->name;
        $makeOrder->email = $request->email;
        $makeOrder->mobile = "";
        $makeOrder->city = $request->city;
        $makeOrder->state = $request->state;
        $makeOrder->pin = $request->pin;
        $makeOrder->address = $request->address;
        $makeOrder->payment_type = null;
        $makeOrder->payment_status = $razorpayOrder->status;
        $makeOrder->reference_no = null;
        $makeOrder->transaction_id = null;

        $makeOrder->save(); 

        $orderId = Orders::where('unique_id','=',$razorpayOrder->id)->select('id')->first(); 
        if(count($request->cartItems) > 0){
            foreach($request->cartItems as $item){ 
                $attributes = [
                    "size" => $item["size"],
                    "color" => $item["color"]
                ];
                $orderItems = new OrderItems();
                
                $orderItems->order_id = $orderId->id;
                $orderItems->product_name = $item["name"];
                $orderItems->image = $item["img"];
                $orderItems->price = $item["price"];
                $orderItems->qty = $item["qty"];
                $orderItems->attributes  = json_encode($attributes);
                
                // dd($orderItems);
                $orderItems->save();
            }
        }
        return response()->json(['order' => $razorpayOrder->toArray(), 'details' => $details, 'message' => 'Order Generated','status' => true]);
    }

    public function paymentStatus(Request $request){ 
        $cart = Cart::where('user_id', '=', auth()->user()->id)->get();
 
        $api_key = 'rzp_test_yrUhuJdTvCIkZ5';
        $api_secret = 'OneqyQ6JIUZPksc1QUyiKDMS';

        $api = new Api($api_key, $api_secret);

        $paymentStatus = $api->payment->fetch($request->get('payment_id'));
        $paymentSuccess = 0;
        if($paymentStatus->status == "captured"){
            $paymentSuccess = 1;
            if ($cart->isNotEmpty()) {
                foreach ($cart as $item) {
                    $item->is_purchased = 1;
                    $item->save(); // Save each item individually
                }
            }
        }
        return view('pages.cart.payment-status',compact('paymentStatus','paymentSuccess'));            
    }
}