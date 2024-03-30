<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItems;
use App\Models\Orders;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::all();
        $users = User::all();
        $orders = Orders::where('payment_status',"=","Paid")->select('price')->get()->toArray();
        $paidOrders = Orders::where('payment_status',"=","Paid")->count();
        $cancledOrders = Orders::where('payment_status',"=","created")->count();
        $failedOrders = Orders::where('payment_status',"=","Failed")->count();
        $totalOrders = Orders::count();
        $revenue = 0;
        if(count($orders)>0){
            foreach($orders as $item){
                $revenue = $revenue + $item["price"];
            }
        }
        $revenue = number_format(($revenue) / 100, 2);

        $productCounts = OrderItems::select('product_id', \DB::raw('count(*) as count'))
            ->groupBy('product_id')
            ->orderByDesc('count')
            ->get();
 
        // foreach ($productCounts as $productCount) {
        //     // dd("Product ID: " . $productCount->product_id . ", Count: " . $productCount->count);
        //     $item=[
        //         "product_id" => $productCount->product_id,
        //         "count" => $productCount->count,
        //     ];
        //     array_push($result,$item);
        // }
        function getProduct($id){
            $product = Product::findOrFail($id);
            return $product;
        }
        $bestSellingProducts = $productCounts->map(function ($productCount) {
            return [
                "product" => getProduct($productCount->product_id),
                "count" => $productCount->count,
            ];
        })->all(); 
        if(auth()->user()->is_admin){
            return view('admin.dashboard',compact('categories','subCategories','products','users','revenue','paidOrders','cancledOrders','failedOrders','totalOrders','bestSellingProducts'));
        }else{
            return redirect('/');
        }
    }
}
