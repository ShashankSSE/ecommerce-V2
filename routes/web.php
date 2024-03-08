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

Route::get('/', function () { 
    return view('pages.index');
});

Route::get('/dashboard', function () {
    if(auth()->user()->is_admin){
        return view('admin.dashboard');
    }else{
        return view('pages.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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
