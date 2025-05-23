<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller{

    public function add_category(){
        $user = Auth::User();
        return view('admin.crud_category.add_category', compact('user') );
    }
    public function list_category()
{
    $user = Auth::User();
    $categorys = Category::all(); // Lấy tất cả bản ghi từ bảng brands
    return view('admin.crud_category.list_category', compact('categorys','user'));
}


public function create_cate(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('image', 'public');
        }

        Category::create($validatedData);

        return redirect()->route('admin.category')->with('success', 'Category added successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred while creating the category. Please try again.']);
    }
}

public function products()
{
    return $this->hasMany(Product::class, 'category_id');
}   
//xóa Cate
public function destroy_category($id)
{
    // Tìm Cate theo ID
    $categorys = Category::findOrFail($id);

     // Kiểm tra nếu Brand có sản phẩm liên quan
     if ($categorys->products()->exists()) {
        return redirect()->route('admin.category')->with('error', 'Cannot delete Category as it has associated products.');
    }

    // Nếu Cate có logo, xóa file logo khỏi storage
    if ($categorys->image) {
        Storage::delete('public/' . $categorys->image);
    }

    // Xóa Cate
    $categorys->delete();

    // Chuyển hướng với thông báo thành công
    return redirect()->route('admin.category')->with('success', 'category deleted successfully!');
}



public function edit_cate($id)
{
    $user = Auth::User();
    // Tìm Category theo ID
    $category = Category::findOrFail($id);

    // Trả về view edit với dữ liệu của Brand
    return view('admin.crud_category.update_category', compact('category','user'));
}

public function update_cate(Request $request, $id)
{
    try {
        $category = Category::findOrFail($id);

        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'updated_at' => 'required|string', // thêm để nhận updated_at từ form
        ]);

        // Kiểm tra concurrency: so sánh updated_at gửi từ form với bản mới nhất trong DB
        if ($category->updated_at->toDateTimeString() !== $validatedData['updated_at']) {
            return back()
                ->withErrors(['error' => 'Dữ liệu đã được thay đổi bởi người khác. Vui lòng tải lại trang và thử lại.'])
                ->withInput();
        }

        // Xử lý hình ảnh mới (nếu có)
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::delete('public/' . $category->image);
            }
            $validatedData['image'] = $request->file('image')->store('image', 'public');
        } else {
            unset($validatedData['image']);
        }

        // Cập nhật dữ liệu
        $category->update($validatedData);

        return redirect()->route('admin.category')->with('success', 'Category updated successfully!');

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred while updating the category. Please try again.']);
    }
}


}