<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[CategoryController::class ,'index']);

Route::get('/products/{id?}',[ProductController::class , 'show']);

Route::get('/category', [CategoryController::class , 'getCategories']);

Route::get('/addproduct',[ProductController::class , 'addProduct'])->middleware('auth');

Route::post('/storeproduct', [ProductController::class , 'store'])->name('/store');

Route::get('/removeproduct/{productid?}', [ProductController::class , 'remove']);

Route::get('/editproduct/{id?}', [ProductController::class, 'edit'])->name('/edit');

Route::get('/reviews', [UserController::class , 'review']);

Route::post('/storereview', [UserController::class , 'storeReview']);

Route::post('/search', [ProductController::class , 'search']);

Route::get('/producttable' , [ProductController::class , 'viewTable'])->middleware('auth');

Route::get('/cart', [CartController::class , 'getForCart'])->middleware('auth');

Route::get('/storeToCart/{id}', [CartController::class , 'store'])->middleware('auth');

Route::get('deleteFromCart/{id}', [CartController::class , 'deleteFromCart']);

Route::get('/addproductimages/{id}', [ProductController::class, 'addImages']);

Route::delete('deleteproductimage/{id}',[ProductController::class , 'deleteImage']);

Route::post('storeproductimage/{id}', [ProductController::class , 'storeImages']);

Route::get('/singleproduct/{id}', [ProductController::class , 'showSingleProduct']);

Route::get('/checkout' , [CartController::class , 'checkout'])->middleware('auth');

Route::post('/storeOrder' , [CartController::class , 'storeOrderDetails']);

Route::get('/latestorder' , [CartController::class , 'getLatestOrders'])->middleware('auth');

Auth::routes([]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
