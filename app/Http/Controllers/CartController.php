<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function index(Request $request){
        $cartItems = null;
        $userInfo = null;
        $user = null;
        if(auth()->user()){
            $cartItems = Cart::with('product')->where('user_id', auth()->user()->id)
                        ->where('is_purchased', '=',0)
                        ->get();
            $user = User::where('id','=',auth()->user()->id)->first();
            $userInfo = UserInformation::where('user_id','=',auth()->user()->id)->first();
        }
        
        return view('pages.cart.index',compact('cartItems','user','userInfo'));
    }
    
    public function addToCart(Request $request,$id){   
        
        $attribute = [
            'size' => $request->size,
            'color' => $request->color,
        ];
        if(auth()->user()){
            // $cartItem = Cart::where('user_id', auth()->user()->id)
            // ->where('product_id', $id)
            // ->first();

            // if ($cartItem) {
            //     return response()->json(['error' => 'This product is already in your cart.'], 409);
            // }
            $product =  Product::findOrFail($id); 
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = intval($id);
            $cart->mrp = $request->mrp ? floatval($request->mrp) : $product->mrp;
            $cart->price = $request->price ? floatval($request->price) : $product->selling;
            $cart->size = json_encode($attribute);
            $cart->image = $request->image ? $request->image : asset('images/products/'.$product->featured_img); 
            // dd($cart);
            $cart->save();

        }else{
            return response()->json(['error' => 'It seems you are not logged in yet. Please login to continue shopping.'], 401);
        }
    }

    public function removeFromCart(Request $request,$id){
        $cart = Cart::findOrFail($id);
        // Delete the Cart model instance
        $cart->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Cart item deleted successfully.');
    }
}
