<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function all(Request  $request){
//        $products = Product::all();

        // nối bảng để lấy tên category
//        $products = Product::leftJoin("categories","categories.id","=","products.category_id")
//            ->select("products.*","categories.name as category_name")->get();
        // dùng relationship
//        $s = $request->get("search");
        $products = Product::with("Category")
//            ->where("category_id","=",1)
//            ->whereDate("created_at","2021-06-18")
//            ->whereMonth("created_at",6)
//            ->where("price",">",500)
//                ->where("name","LIKE","%$s%") // tim kiem theo ten
//              ->orderBy("price","asc")
//                ->limit(1) // so luong lay
//                ->skip(1) // so luong bo qua
            ->get();
        return view("product.list",[
           "products"=>$products
        ]);
    }

    public function form(){
        $categories = Category::all();
        return view("product.form",[
            "categories"=>$categories
        ]);
    }

    public function save(Request $request){
        $request->validate([
            "name"=>"required",
           // "image"=>"required",
         //   "description"=>"required",
            "price"=>"required|min:0",
            "qty"=>"required|min:0",
            "category_id"=>"required|numeric|min:1",
        ],[
           "name.required"=>"Vui lòng nhập tên sản phẩm",
           "category_id.min"=>"Vui lòng nhập danh mục",
        ]);
        // upload file image
        $image = null;
        if($request->has("image")){
            $file = $request->file("image");
//            $fileName = $file->getClientOriginalName(); // lấy tên file
            $extName = $file->getClientOriginalExtension();// lấy đuôi file ( ví dụ như png, jpg)
            $fileName = time().".".$extName;
            $fileSize = $file->getSize();// lấy kích thước file
            $allow = ["png","jpg","jpeg","gif"];// chỉ cho phép nhưng file này up lên
            if(in_array($extName,$allow)){ // nếu đuôi file trong danh sách cho phép
                if($fileSize < 10000000){ // kich thuoc nho hon 10MB
                    try {
                        $file->move("upload",$fileName); // up file len host
                        $image = $fileName;
                    }catch (\Exception $e){}

                }
            }
        }

        try {
            Product::create([
                "name"=>$request->get("name"),
                "image"=>$image,
                "description"=>$request->get("description"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
            ]);
        }catch (\Exception $e){
            abort(404);
        }
        return redirect()->to("products");
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = [];// mảng giỏ hàng
        if(Session::has("cart")){ // nếu có giỏ hàng rồi
            $cart = Session::get("cart");// $_SESSION["cart"]
        }
        if(!$this->checkCart($cart,$product)){// sp chua co trong gio hang
            $product->cart_qty = 1;//them 1 thuoc tinh ngoai le de bieu thi so luong sp trong gio hang
            $cart[] = $product;
        }else{
            for($i=0;$i<count($cart);$i++){
                if($cart[$i]->id == $product->id){
                    $cart[$i]->cart_qty = $cart[$i]->cart_qty+1;
                }
            }
        }
        Session::put("cart",$cart);
        return redirect()->to("cart");
    }

    // tim kiem xem sp da co trong gio hang hay chua
    private function checkCart($cart,$p){
        foreach ($cart as $item){
            if($item->id == $p->id){
                return true;
            }
        }
        return false;
    }

    public function cart(){
        $cart = [];// mảng giỏ hàng
        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        dd($cart);
    }
}
