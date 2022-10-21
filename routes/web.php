<?php

use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return '
    <h1 style="text-align: center;">Landing Page</h1>
    <a href="/login"><h3 style="text-align: center;">Login  </h3></a>
    ';
});



Route::get('/rickroll', function () {
    return view( 'rickroll' ,
        ['rick' => 'hahaha']
    );
});

Route::get('/login', [AuthController::class, 'login'])->middleware('AlreadyLogged');;
Route::get('/register', [AuthController::class, 'registration'])->middleware('AlreadyLogged');

Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/product', [productController::class, 'index'])->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout']);