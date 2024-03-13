<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){ 
        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                    ->join('sub_category', 'products.sub_category', '=', 'sub_category.id')
                    ->select('products.id','products.name','products.slug','products.mrp','products.selling','categories.name as category','categories.slug as category_slug','products.featured_img','products.is_featured','products.is_flash_sale','products.is_active','products.created_at','products.created_by','sub_category.title as subcategory')
                    ->get();

        return view('pages.index',compact('products'));
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


}
