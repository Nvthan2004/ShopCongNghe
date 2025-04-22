<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class UserController extends Controller{



    public function product_user_view(){
        return view('user.view_products');
    }

    public function product_detail(){
        return view('user.detail_product');
    }
}
