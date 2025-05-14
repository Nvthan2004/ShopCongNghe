<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        // Trả về view home_admin.blade.php từ admin/crud
        return view('admin.crud.home_admin',compact('user'));
    }

    public function dashboard()
    {
        return view('admin.dashboard_admin');
    }
    public function crud_product(){
        return view('admin.crud_product.list_product');
    }
    public function crud_brand(){

        return view('admin.crud_brand.list_brand');
    }
    public function crud_category(){

        return view('admin.crud_category.add_category');
    }
    public function crud_user(){

        return view('admin.crud_user.list_user');
    }
    
}
