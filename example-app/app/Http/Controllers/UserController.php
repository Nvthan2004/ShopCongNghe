<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;

class UserController extends Controller{

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (auth()->check() && auth()->user()->role !== 'admin') {
    //             return redirect()->route('user.home');  // Chuyển hướng về trang home nếu không phải admin
    //         }
    //         return $next($request);
    //     });
    // }


    public function list_user() {
        $users = User::paginate(10); // Đúng cú pháp
        return view('admin.crud_user.list_user', compact('users'));
    }
    
    public function product_user_view(){
        return view('user.view_products');
    }

    public function product_detail(){
        return view('user.detail_product');
    }
   
}
