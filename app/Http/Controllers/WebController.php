<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('home');
    }

    public function aboutUs(){
        return view("about-us");
    }

    public function productList(){
        $products = Product::with("Category")->get();
        return response()->json([
            "status"=>true,
            "message"=>"Success",
            "products"=>$products
        ]);
    }
}
