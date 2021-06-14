<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
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

Route::get('/',[WebController::class,"home"]);
Route::get('/about-us',[WebController::class,"aboutUs"]);
Route::get('/categories',[CategoryController::class,"all"]);
Route::get('/categories/new',[CategoryController::class,"form"]);
Route::post('/categories/save',[CategoryController::class,"save"]);
Route::get('/categories/edit/{id}',[CategoryController::class,"edit"]);
Route::post('/categories/update/{id}',[CategoryController::class,"update"]);

