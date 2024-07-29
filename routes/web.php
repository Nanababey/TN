<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('foods/food-details/{id}', [App\Http\Controllers\Foods\FoodsController::class, 'foodDetails'])->name('food.details');

//carrt

Route::post('foods/food-details/{id}', [App\Http\Controllers\Foods\FoodsController::class, 'cart'])->name('food.cart');
Route::get('foods/food-cart/', [App\Http\Controllers\Foods\FoodsController::class, 'displayCartItems'])->name('food.display.cart');
Route::get('foods/delete-cart/{id}', [App\Http\Controllers\Foods\FoodsController::class, 'deleteCartItems'])->name('food.delete.cart');

//tt
Route::post('foods/prepare-checkout', [App\Http\Controllers\Foods\FoodsController::class, 'prepareCheckout'])->name('prepare.checkout');
Route::get('foods/checkout', [App\Http\Controllers\Foods\FoodsController::class, 'checkout'])->name('foods.checkout');
Route::post('foods/checkout', [App\Http\Controllers\Foods\FoodsController::class, 'storeCheckout'])->name('foods.checkout.store');


// menu

Route::get('foods/menu', [App\Http\Controllers\Foods\FoodsController::class, 'menu'])->name('foods.menu');

//search
// Route::get('foods/search', [App\Http\Controllers\Foods\FoodsController::class, 'search'])->name('foods.search');
Route::post('foods/search', [App\Http\Controllers\Foods\FoodsController::class, 'search'])->name('foods.search');



//user
Route::get('users/all-orders', [App\Http\Controllers\Users\UsersController::class, 'getOrders'])->name('users.orders');


//review
Route::get('users/Write-reviews', [App\Http\Controllers\Users\UsersController::class, 'viewReview'])->name('users.review.create');
Route::post('users/Write-reviews', [App\Http\Controllers\Users\UsersController::class, 'submitReview'])->name('users.review.store');




Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

Route::get('admin/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');

//order
Route::get('all-orders', [App\Http\Controllers\Admins\AdminsController::class, 'allOrders'])->name('orders.all');
Route::get('edit-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editOrders'])->name('orders.edit');
Route::get('detail-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'orderDetail'])->name('orders.detail');
Route::post('edit-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateOrders'])->name('orders.update');





Route::get('all-foods', [App\Http\Controllers\Admins\AdminsController::class, 'allFoods'])->name('all.foods');
Route::get('create-foods', [App\Http\Controllers\Admins\AdminsController::class, 'createFood'])->name('create.foods');
Route::post('create-foods', [App\Http\Controllers\Admins\AdminsController::class, 'storeFood'])->name('store.foods');
Route::get('delete-foods/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteFood'])->name('delete.foods');



