<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\Auth\LoginController;

//Route::match(["get","post"],"login",[LoginController::class,"login"])->name("login");

Route::middleware("auth:admin")->group(function (){
    Route::get('/',[WebController::class,"home"]);
    Route::get('/about-us',[WebController::class,"aboutUs"]);

    Route::get('/categories',[CategoryController::class,"all"]);
    Route::get('/categories/new',[CategoryController::class,"form"]);
    Route::post('/categories/save',[CategoryController::class,"save"]);
    Route::get('/categories/edit/{id}',[CategoryController::class,"edit"]);
    Route::post('/categories/update/{id}',[CategoryController::class,"update"]);

    Route::get('/products',[ProductController::class,"all"]);
    Route::get('/products/new',[ProductController::class,"form"]);
    Route::post('/products/save',[ProductController::class,"save"]);
});

///request -> routing -> middleware (kiem tra)   ---> controller
