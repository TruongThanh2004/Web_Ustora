<?php

use App\Helper\SoSanh;
use App\Http\Controllers\AdminControlle;
use App\Http\Controllers\BookingControlle;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartLastController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutControlle;
use App\Http\Controllers\DonDaDatController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SoSanhControlle;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\AdminMiddleware;
use App\Models\DonDaDatSession;
use App\Models\Product;
use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Paginator::useBootstrap();
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
//Trang chu
Route::get('/{page?}',[HomeController::class,'index'])->name('index');

//Chi Tiet San Pham
Route::get('/single-product/{product}',[HomeController::class,'product'])->name('single.product');

//San pham theo danh muc
Route::get('/category-product/{categoryproducts}',[HomeController::class,'categoryproducts'])->name('category');
Route::get('/product-category/{productcategory}',[HomeController::class,'productcategory'])->name('product.category');
Route::get('/logo-product/{logoproduct}',[HomeController::class,'logoproduct'])->name('logo.product');

//Top khuyen mai
Route::get('/topsellers-product/{topselersproducts}',[HomeController::class,'topselersproducts'])->name('topsellers.product');

//Tim kiem san pham
Route::get('/search-product/{searchproduct}',[HomeController::class,'searchproduct'])->name('timkiem.product');


//Gio Hang
Route::post('/cart/{add}',[CartController::class,'add'])->name('cart.add')->middleware('auth.check');
Route::get('/cart/{listproduct}',[CartController::class,'listproduct'])->name('cart.product');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

//Thanh Toan
Route::get('/pay/{checkout}', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/pay/{store}', [BookingControlle::class, 'store'])->name('pay');
Route::post('/vnpay_payment', [CheckoutControlle::class, 'vnpay_payment']);

//So sanh san pham
Route::post('/sosanh/{sosanh}',[SoSanhControlle::class,'sosanh'])->name('sosanh.add');
Route::get('/sosanh/{listproduct}',[SoSanhControlle::class,'listproduct'])->name('sosanh.product');
Route::get('/sosanh/removesosanh/{productId}', [SoSanhControlle::class, 'removesosanh'])->name('sosanh.remove');


//Tim kiem san pham trong admin
Route::get('/indexadmin/{index}',[ProductController::class,'index'])->name('timkiem.admin');

//San pham theo danh muc admin
//Route::get('/indexadmin/{index}',[ProductController::class,'index'])->name('category');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   



//CRUD ADMIN
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
      
    });



    Route::controller(CategoryController::class)->prefix('products/category')->group(function () {
        Route::get('', 'index')->name('products_category');
        Route::get('create', 'create')->name('category.create');
        Route::post('store', 'store')->name('category.store');
        Route::get('show/{id}', 'show')->name('category.show');
        Route::get('edit/{id}', 'edit')->name('category.edit');
        Route::put('edit/{id}', 'update')->name('category.update');
        Route::delete('destroy/{id}', 'destroy')->name('category.destroy');
        Route::get('/profile_admin',[App\Http\Controllers\AuthController::class,'profile'])->name('profile');
    });

    //Uy quyen
    Route::controller(AuthorityController::class)->prefix('products/authority')->group(function () {
        Route::get('', 'index')->name('products_author');
        Route::get('/{id}','author')->name('author');
        Route::put('/{id}', 'update')->name('author.update');
        Route::delete('destroy/{id}', 'destroy')->name('author.destroy');
    });


});
Route::get('/profile_admin',[App\Http\Controllers\AuthController::class,'profile'])->name('profile');
Route::get('products/profile_admin',[App\Http\Controllers\AuthController::class,'profile'])->name('profile');
Route::put('/profile_admin/{id}', [App\Http\Controllers\AuthController::class, 'update'])->name('update_profile');



//Danh sách yêu thích
Route::get('/favorites_list',[App\Http\Controllers\FavoritesListController::class,'index'])->name('favorites_list');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// // Route cho trang quên mật khẩu
Route::get('/auth/otp', [ForgotPasswordController::class, 'showOtpForm'])->name('auth.otp');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Route cho trang nhập mã OTP
Route::get('/auth/reset-password', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/check-otp', [ForgotPasswordController::class, 'checkOtp'])
    ->name('password.checkOtp');

// Route cho trang đặt lại mật khẩu
Route::post('/auth/reset-password', [ForgotPasswordController::class, 'update'])
    ->name('password.update');

