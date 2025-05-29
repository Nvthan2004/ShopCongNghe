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
    $request->validate([
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ],
[
    'avatar.image' => 'File tải lên phải là ảnh.',
    'avatar.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, jpg, png, gif.',
    'avatar.max' => 'Ảnh không được vượt quá 2MB.',
]);

    $user = auth()->user();

    // Xử lý upload avatar mới nếu có
    if ($request->hasFile('avatar')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($user->img && \Storage::disk('public')->exists($user->img)) {
            \Storage::disk('public')->delete($user->img);
        }

        // Lưu ảnh mới
        $file = $request->file('avatar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('avatars', $filename, 'public');

        // Cập nhật đường dẫn ảnh
        $user->img = $path;
    }

    $user->save();

    return back()->with('success', 'Cập nhật thông tin thành công!');
}


    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'current_password'],
        'new_password' => ['required', 'string', 'min:6','max:50', 'confirmed'],
    ],[
        'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
    'new_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
    'new_password.max' => 'Mật khẩu không được vượt quá 50 ký tự.',
    'new_password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ]);

    $user = auth()->user();
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
}
public function changeEmail(Request $request)
{
    $request->validate([
        'new_email' => 'required|email|unique:users,email,' . auth()->id(),
    ]);

    $user = auth()->user();
    $user->email = $request->new_email;
    $user->save();

    return back()->with('success', 'Email đã được cập nhật thành công!');
}

}