<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(){ 
        $products = Product::join('categories', 'products.category', '=', 'categories.id')
            ->join('sub_category', 'products.sub_category', '=', 'sub_category.id')
            ->select('products.id', 'products.name', 'products.slug', 'products.mrp', 'products.selling', 'categories.name as category', 'categories.slug as category_slug', 'products.featured_img', 'products.is_featured', 'products.is_flash_sale', 'products.is_active', 'products.created_at', 'products.created_by', 'sub_category.title as subcategory') 
            ->get(); 
            $cart = Cart::where('is_purchased','=',0)->get()->toArray();
            $cartItem = [];
            if(count($cart) > 0){                
                foreach ($cart as $item) {
                    array_push($cartItem, $item['product_id']);
                }
            }
            
        return view('pages.index',compact('products','cartItem'));
    }

    public function category($slug){
        $products = Category::leftJoin('products', 'categories.id', '=', 'products.category')
                    ->where('categories.slug', '=', $slug)
                    ->where('products.is_active', '=', 1)
                    ->select(
                        'products.id',
                        'products.name',
                        'products.slug',
                        'products.mrp',
                        'products.selling',
                        'categories.name as category',
                        'categories.slug as category_slug',
                        'products.featured_img',
                        'products.is_featured',
                        'products.is_flash_sale',
                        'products.is_active',
                        'products.created_at',
                        'products.created_by'
                    )
                    ->get();
        return view('pages.category',compact('products','slug'));
    }

    public function subcategory($slug){
        $products = SubCategory::leftJoin('products', 'sub_category.id', '=', 'products.sub_category')
                    ->where('sub_category.slug', '=', $slug)
                    ->where('products.is_active', '=', 1)
                    ->select(
                        'products.id',
                        'products.name',
                        'products.slug',
                        'products.mrp',
                        'products.selling',
                        'sub_category.title as sub_category',
                        'sub_category.slug as sub_category',
                        'products.featured_img',
                        'products.is_featured',
                        'products.is_flash_sale',
                        'products.is_active',
                        'products.created_at',
                        'products.created_by'
                    )
                    ->get();
                    
        return view('pages.sub-category',compact('products','slug'));
    }

    public function singleProduct(Request $request,$slug){
        $product = Product::join('categories', 'products.category', '=', 'categories.id')
                ->join('sub_category', 'products.sub_category', '=', 'sub_category.id')
                ->select('products.id', 'products.name', 'products.slug', 'products.mrp', 'products.selling', 'products.featured_img','products.size','products.weight','products.color','products.unit','products.sizeArray','products.weightArray','products.unitArray', 'products.colorArray', 'products.meta_title', 'products.meta_desc','products.short_Desc','products.desc', 'products.is_featured', 'products.is_flash_sale', 'products.is_active', 'products.created_at', 'products.created_by', 'sub_category.title as subcategory','categories.name as category', 'categories.slug as category_slug', )
                ->where('products.slug', '=', $slug)
                ->where('products.is_active', '=', 1)
                ->first();
        $is_availabe_in_cart = 0;
        if(auth()->user()){
            $is_availabe_in_cart = Cart::where('user_id','=',auth()->user()->id)->where('size',$request->size ? $request->size : $product->size)->exists();
        }
        
        if($is_availabe_in_cart){
            $is_availabe_in_cart = 1;
        }
        if(isset($request->size)){
            $sizeVarient = json_decode($product->sizeArray);
            if(count($sizeVarient) > 0){
                foreach($sizeVarient as $productSize){
                    if($productSize->size == $request->size){
                        // $product->size = $productSize->size;
                        $product->mrp = $productSize->mrp;
                        $product->selling = $productSize->selling;
                        if($productSize->image){
                            $product->featured_img = basename($productSize->image);
                        }                        
                    }
                }
            }
        }
        return view('pages.single-product',compact('product','is_availabe_in_cart'));
    }

    

}
