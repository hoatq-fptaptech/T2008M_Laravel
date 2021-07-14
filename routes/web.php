<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\User\Auth\LoginController;
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
// danh cho user
Route::match(["get","post"],"login",[LoginController::class,"login"])->name("login");

Route::middleware("auth")->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/cart',[ProductController::class,"cart"]);
Route::get('/checkout',[ProductController::class,"checkout"]);
Route::post('/checkout',[ProductController::class,"placeOrder"]);

