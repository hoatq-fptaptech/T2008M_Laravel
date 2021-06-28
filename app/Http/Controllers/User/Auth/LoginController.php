<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->method() == "GET")
            return view("auth.login");
        // nếu chỉ là login user thông thường thì ko cần làm việc này
//        $credentials = $request->only(["email","password"]);
//        if(Auth::attempt($credentials)){ // login của bảng users
//            return redirect()->to("admin");
//        }
        // ddawng nhập cho admin
        $credentials = $request->only(["email","password"]);
        if(Auth::guard("admin")->attempt($credentials)){
            return redirect()->to("admin");
        }
        return redirect()->back()->withInput();

        // Auth::user()-> trả về User object đang login
        // Auth::id() -> trả về id của user đang login
        // Auth::check() -> trả về true/false -> đã đăng nhập hay chưa
    }
}
