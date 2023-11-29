<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MacaronController;
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

Route::get('/', [MacaronController::class, 'home']);

Route::redirect('/home', '/');

Route::get('/post', function() {
    return view('insert');
});

Route::prefix('/shop')->group(function() {

    Route::get('/', [MacaronController::class, 'shop']);

});

Route::prefix('/cart')->group(function() {

    Route::get('/', [CartController::class, 'view']);

    Route::post('/insert/{macaron}', [CartController::class, 'insert']);

});

Route::prefix('/insert')->group(function() {

    Route::get('/', function() {
        return view('insert');
    });

    Route::post('/form', [MacaronController::class, 'form']);

});
