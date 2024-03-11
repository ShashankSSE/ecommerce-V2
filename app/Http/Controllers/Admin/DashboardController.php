<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::all();
        $users = User::all();
        if(auth()->user()->is_admin){
            return view('admin.dashboard',compact('categories','subCategories','products','users'));
        }else{
            return redirect('/');
        }
    }
}
