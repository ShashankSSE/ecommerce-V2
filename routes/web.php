<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShipRocketController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ApiSettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () { 
//     return view('pages.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('store/category')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'category'])->name('frontend.category.index');    
});
Route::prefix('store/sub-category')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'subcategory'])->name('frontend.subcategory.index');    
});
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');    
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');    
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');    
});
Route::prefix('order')->group(function () {
    Route::post('/', [OrderController::class, 'index'])->name('order.index');     
    Route::get('/payment', [OrderController::class, 'paymentStatus'])->name('payment.success');     
});

Route::prefix('store/product')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'singleProduct'])->name('frontend.singleProduct.index');    
});
// Route::get('/dashboard', function () {
//     if(auth()->user()->is_admin){
//         return view('admin.dashboard');
//     }else{
//         return view('pages.index');
//     }
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('category')->group(function () {
    Route::get('/view-category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/update-category-status/{id}', [CategoryController::class, 'status'])->name('category.status.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware(['auth'])->prefix('sub-category')->group(function () {
    Route::get('/view-sub-category', [SubCategoryController::class, 'index'])->name('sub-category.index');
    Route::get('/create-sub-category', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::post('/store-sub-category', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::get('/get-sub-category/{id}', [SubCategoryController::class, 'getSubCategory'])->name('sub-category.get');
    Route::post('/update-sub-category', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/update-sub-category-status/{id}', [SubCategoryController::class, 'status'])->name('sub-category.status.update');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class, 'destroy'])->name('sub-category.destroy');
});



Route::middleware(['auth'])->prefix('attributes')->group(function () {
    Route::get('/view-attributes', [AttributeController::class, 'index'])->name('attribute.index');
    Route::get('/create-attribute', [AttributeController::class, 'create'])->name('attribute.create');
    Route::post('/store-attribute', [AttributeController::class, 'store'])->name('attribute.store');
    Route::get('/edit-attribute/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
    Route::post('/update-attribute', [AttributeController::class, 'update'])->name('attribute.update');
    Route::get('/update-attribute-status/{id}', [AttributeController::class, 'status'])->name('attribute.status.update');
    Route::get('/delete-attribute/{id}', [AttributeController::class, 'destroy'])->name('attribute.destroy');
});


Route::middleware(['auth'])->prefix('product')->group(function () {
    Route::get('/view-product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product', [ProductController::class, 'update'])->name('product.update');
    Route::get('/update-product-status/{id}', [ProductController::class, 'status'])->name('product.status.update');
    Route::get('/update-product-flash-sale-status/{id}', [ProductController::class, 'flashSaleStatus'])->name('product.flashSale.update');
    Route::get('/update-product-featured-status/{id}', [ProductController::class, 'featuredStatus'])->name('product.featured.update');    
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::middleware(['auth'])->prefix('site-management')->group(function () {
    Route::get('/pages', [SiteController::class, 'index'])->name('page.index');
    Route::get('/create-page', [SiteController::class, 'create'])->name('page.create');
    Route::post('/store-page', [SiteController::class, 'store'])->name('page.store');
    Route::get('/edit-page/{id}', [SiteController::class, 'edit'])->name('page.edit');
    Route::post('/update-page', [SiteController::class, 'update'])->name('page.update');
    Route::get('/update-page-status/{id}', [SiteController::class, 'status'])->name('page.status.update');
    Route::get('/delete-page/{id}', [SiteController::class, 'destroy'])->name('page.destroy');

    Route::get('/general-settings', [SiteController::class, 'settings'])->name('settings.index');
    Route::post('/general-settings', [SiteController::class, 'settingsUpdate'])->name('settings.update');

    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/create-faq', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/store-faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/edit-faq/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('/update-faq', [FaqController::class, 'update'])->name('faq.update');
    Route::get('/update-faq-status/{id}', [FaqController::class, 'status'])->name('faq.status.update');
    Route::get('/delete-faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');


});


Route::middleware(['auth'])->prefix('user-management')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update-user', [UserController::class, 'update'])->name('user.update');
    Route::get('/update-user-status/{id}', [UserController::class, 'status'])->name('user.status.update');
    Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth'])->prefix('order-management')->group(function () {
    Route::get('/orders', [OrderController::class, 'orders'])->name('admin.orders');
    Route::get('/orders/order-items/{order_id}', [OrderController::class, 'getOrderItems'])->name('admin.orderItems'); 
});

Route::middleware(['auth'])->prefix('api-settings')->group(function () {
    Route::get('/payment-gateway', [ApiSettingsController::class, 'index'])->name('admin.paymentgateway');
    Route::post('/payment-gateway-edit', [ApiSettingsController::class, 'edit'])->name('admin.paymentgateway.edit');
    Route::post('/payment-gateway-update', [ApiSettingsController::class, 'update'])->name('admin.paymentgateway.update');
    // Route::get('/orders/order-items/{order_id}', [OrderController::class, 'getOrderItems'])->name('admin.orderItems'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/shiprocket-authentication', [ShipRocketController::class, 'index'])->name('shiprocked.index');
    
});

Route::get('/product-and-services', function () { 
    return view('pages.services');
});
Route::get('/about', function () { 
    return view('pages.about');
});
Route::get('/contact', function () { 
    return view('pages.contact');
});
Route::get('/privacy-policy', function () { 
    return view('pages.privacy-policy');
});
Route::get('/terms-and-condition', function () { 
    return view('pages.terms-and-condition');
});
Route::post('/submit-form', [ContactFormController::class, 'submitForm']);
Route::post('/book-demo', [ContactFormController::class, 'bookDemo']);
Route::post('/get-broucher', [ContactFormController::class, 'getBroucher']);
    
require __DIR__.'/auth.php';
