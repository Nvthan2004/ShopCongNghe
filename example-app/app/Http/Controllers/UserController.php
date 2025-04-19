<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class UserController extends Controller{

    public function home_user()
    {
        // Trả về view dao diện người dùng trang home
        return view('user.index');
    }
    public function product_user_view(){
        return view('user.view_products');
    }

    public function product_detail(){
        return view('user.detail_product');
    }
}
