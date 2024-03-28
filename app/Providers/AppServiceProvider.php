<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        date_default_timezone_set('Asia/Kolkata');

        $settings = Settings::where('id','=',1)->first();
        $categories = Category::with('subcategories')->where('status','=','active')->get();
        $cart = Cart::where('is_purchased','=',0)->get();
        $totalProductInCart = count($cart);
        View::share([
            'settings' => $settings,
            'categories' => $categories,
            'totalProductInCart' => $totalProductInCart
        ]);
    }
}
