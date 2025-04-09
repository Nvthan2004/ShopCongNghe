<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function home()
    {
        // Trả về view home_admin.blade.php từ admin/crud
        return view('admin.crud.home_admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard_admin');
    }
    public function crud_product(){
        return view('admin.crud_product.list_product');
    }
    
}
