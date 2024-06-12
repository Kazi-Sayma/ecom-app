<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\Admin\SupplierOrVendorController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\website\CartController;


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

Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('/product',[WebsiteController::class,'product'])->name('product');
Route::get('/product/details/{id}',[WebsiteController::class,'productDetails'])->name('product.details');
//Route::get('/cart',[WebsiteController::class,'cart'])->name('cart');
Route::get('/checkout',[WebsiteController::class,'checkout'])->name('checkout');


Route::resources(['carts'=>CartController::class]);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resources(['categories'=>CategoryController::class]);
    Route::resources(['subcategories'=>SubcategoryController::class]);
    Route::resources(['brands'=>BrandController::class]);
    Route::resources(['colors'=>ColorController::class]);
    Route::resources(['sizes'=>SizeController::class]);
    Route::resources(['supplier'=>SupplierOrVendorController::class]);
    Route::resources(['products'=>ProductController::class]);
    Route::resources(['units'=>UnitController::class]);

    Route::get('/get-sub-category-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::get('/product/status/{id}',[ProductController::class,'info'])->name('products.status');




});
