<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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
    public function edit()
    {
        $user = Auth::User();
    return view('user.setting', compact('user'));
    }
   public function update(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'avatar' => 'nullable|image|max:2048', // field từ form
    ]);

    // Xử lý ảnh đại diện
    if ($request->hasFile('avatar')) {
        // Xóa ảnh cũ nếu có
        if ($user->img) {
            Storage::disk('public')->delete($user->img); // dùng đúng tên cột img
        }

        // Lưu file và gán tên file vào cột img
        $data['img'] = $request->file('avatar')->store('images', 'public');
    }

    // Xóa 'avatar' khỏi mảng vì không có cột avatar trong DB
    unset($data['avatar']);

    $user->update($data);

    return redirect()->route('user.edit')->with('success', 'Cập nhật thành công!');
}

    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'current_password'],
        'new_password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    $user = auth()->user();
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
}

}
