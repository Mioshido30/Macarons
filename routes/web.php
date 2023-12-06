<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MacaronController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\HistoryController;

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

Route::get('/', [MacaronController::class, 'home']);

Route::redirect('/home', '/')->name('home');

Route::get('/post', function() {
    return view('insert');
});

Route::prefix('/shop')->group(function() {

    Route::get('/', [MacaronController::class, 'shop']);

    Route::get('/macaron/{name}',[MacaronController::class,'collections']);

    Route::get('/product/{id}', [MacaronController::class, 'details']);

    Route::get('/filter/{filter}', [MacaronController::class, 'filter']);

    Route::get('/category/{type}/{category}', [MacaronController::class, 'category']);

});

Route::prefix('/cart')->group(function() {

    Route::get('/', [CartController::class, 'view']);

    Route::post('/insert/{macaron}', [CartController::class, 'insert']);

})->middleware('loggedin');

Route::prefix('/insert')->group(function() {

    Route::get('/', function() {
        return view('insert');
    });

    Route::post('/form', [MacaronController::class, 'form']);

});


Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('loggedin')->group(function(){

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile','index')->name('profile');
        Route::post('/update/profile','updateProfile')->name('updateprofile');
        Route::post('/update/picture','updatePicture');
    });

    Route::controller(CartController::class)->group(function(){
        Route::get('/cart/{id}/red','redItem');
        Route::get('/cart/{id}/add','addItem');
    });

    Route::controller(HistoryController::class)->group(function(){
        Route::post('/history/add','insert');
    });

});
