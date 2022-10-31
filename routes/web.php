<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return '
//     <h1 style="text-align: center;">Landing Page</h1>
//     <a href="/product"><h2 style="text-align: center;">PRODUCTS</h2></a>
//     <a href="/login"><h3 style="text-align: center;">Login</h3></a>
//     <a href="/logout"><h3 style="text-align: center; margin: 20px;">Logout  </h3></a>
//     ';
// });


Route::get('/', function () {
    return view( 'landing-page');
});


Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');


Route::get('/product', [productController::class, 'index']);
Route::get('/product/{product}', [productController::class, 'show']);



Route::middleware("auth")->group(function () {
    Route::post('/buy', [TransactionController::class, 'transaction'])->name('buy');
    Route::post('/create-order', [OrderController::class, 'create'])->name('create-order');
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware("AlreadyLogged")->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registration'])->name('register');
});



Route::middleware("isAdmin")->group(function () {
    Route::get('/report', [productController::class, 'report']);
    Route::get('/input-product', [productController::class, 'input']);

});































Route::get('/rickroll', function () {
    return view( 'rickroll' ,
        ['rick' => 'hahaha']
    );
});
