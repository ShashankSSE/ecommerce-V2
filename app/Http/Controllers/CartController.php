<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function index(Request $request){

        $cartItems = Cart::with('product')->where('user_id', auth()->user()->id)
                    ->where('is_purchased', '=',0)
                    ->get();
        
        return view('pages.cart.index',compact('cartItems'));
    }
    
    public function addToCart(Request $request,$id){        
        if(auth()->user()){
            $cartItem = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $id)
            ->first();

            if ($cartItem) {
                return response()->json(['error' => 'This product is already in your cart.'], 409);
            }
            
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;

            $cart->save();

        }else{
            return response()->json(['error' => 'It seems you are not logged in yet. Please login to continue shopping.'], 401);
        }
    }
}
