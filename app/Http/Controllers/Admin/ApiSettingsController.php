<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentGatewayModel;

class ApiSettingsController extends Controller
{    
    public function index(){
        return view('admin/settings/payment-gateway');
    }
    public function edit(Request $request){
        $payGateway = PaymentGatewayModel::where('payment_gateway','=',$request->paymentGateway)->first();
        $paymentGateway = $payGateway;
        
        return response()->json(['success' => true, 'paymentGateway' => $paymentGateway]);
    }

    public function update(Request $request){
        $is_available = PaymentGatewayModel::where('payment_gateway','=',$request->paymentGateway)->first();
        if(!$is_available){
            $paymentGateway = new PaymentGatewayModel;
            $paymentGateway->payment_gateway = $request->paymentGateway;
            $paymentGateway->key  = $request->paymentGatewayKey;
            $paymentGateway->secret  = $request->paymentGatewaySecret;
            $paymentGateway->mode  = $request->paymentGatewayMode;
            $paymentGateway->is_active  = ($request->is_active == "on") ? True : False;

            $paymentGateway->save();


            return response()->json(['success' => true,'message' => 'Payment Gateway has been added successfull!']);
        }else{
            $is_available->payment_gateway = $request->paymentGateway;
            $is_available->key  = $request->paymentGatewayKey;
            $is_available->secret  = $request->paymentGatewaySecret;
            $is_available->mode  = $request->paymentGatewayMode;
            $is_available->is_active  = ($request->is_active == "on") ? True : False;

            $is_available->save();

            return response()->json(['success' => true,'message' => 'Payment Gateway has been Updated successfull!']);
        }
    }
}
