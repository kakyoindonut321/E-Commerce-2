<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\historyController;
use Database\Factories\HistoryFactory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


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


Route::get('/', [productController::class, 'main']);


Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');


Route::get('/product', [productController::class, 'index']);
Route::get('/product/{product}', [productController::class, 'show']);
Route::get('/product', [productController::class, 'index'])->name('search');



Route::middleware("auth")->group(function () {
    Route::post('/buy', [TransactionController::class, 'transaction'])->name('buy');
    Route::post('/create-cart', [CartController::class, 'create'])->name('create-cart');
    Route::post('/cart/buy', [CartController::class, 'buy']);
    Route::get('/user/{user}', [AuthController::class, 'user']);
    Route::delete('/cart/{cart}', [CartController::class, 'delete']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/history', [historyController::class, 'index']);
    Route::put("/profile", [AuthController::class, "update"]);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware("AlreadyLogged")->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registration'])->name('register');
});

Route::middleware("isAdmin")->group(function () {
    Route::get('/report', [productController::class, 'report']);
    Route::get('/user-order', [OrderController::class, 'index']);
    Route::post('/order/{order}', [OrderController::class, 'aproval']);
    Route::get('/input-product', [productController::class, 'input']);
    Route::post('/create-product', [productController::class, 'store'])->name('create-product');
    Route::delete('/product/{product}', [productController::class, 'delete']);
    Route::put('/product/{product}', [productController::class, 'update']);
    Route::get('/product/{product}/edit', [productController::class, 'edit']);

});


// Route::middleware("isSellerAndAdmin")->group(function () {
//     Route::get('/input-product', [productController::class, 'input']);
//     Route::post('/create-product', [productController::class, 'store'])->name('create-product');
//     Route::delete('/product/{product}', [productController::class, 'delete']);
//     Route::put('/product/{product}', [productController::class, 'update']);
//     Route::get('/product/{product}/edit', [productController::class, 'edit']);
//   });

Route::get('/image/produk/{path}', function ($path) {
    $path = storage_path('app/image/produk' . $path);
 
    if (!File::exists($path)) {
        abort(404);
    }
 
    $file = File::get($path);
    $type = File::mimeType($path);
 
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
 
    return $response; ;
});





















// raka






Route::get('/rickroll', function () {
    return view( 'rickroll' ,
        ['rick' => 'hahaha']
    );
});
