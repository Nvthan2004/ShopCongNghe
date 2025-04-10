<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    public function add_category(){
        return view('admin.crud_category.add_category');
    }
    public function list_category()
{
    $categorys = Category::all(); // Lấy tất cả bản ghi từ bảng brands
    return view('admin.crud_category.list_category', compact('categorys'));
}


public function create_cate(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('image', 'public');
    }

    Category::create($validatedData);

    return redirect()->route('admin.category')->with('success', 'Brand added successfully!');
}
//xóa Cate
public function destroy_category($id)
{
    // Tìm Cate theo ID
    $categorys = Category::findOrFail($id);

    // Nếu Cate có logo, xóa file logo khỏi storage
    if ($categorys->image) {
        \Storage::delete('public/' . $categorys->image);
    }

    // Xóa Cate
    $categorys->delete();

    // Chuyển hướng với thông báo thành công
    return redirect()->route('admin.category')->with('success', 'category deleted successfully!');
}



public function edit_cate($id)
{
    // Tìm Brand theo ID
    $category = Category::findOrFail($id);

    // Trả về view edit với dữ liệu của Brand
    return view('admin.crud_category.update_category', compact('category'));
}

public function update_cate(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Xử lý logo
    if ($request->hasFile('image')) {
        // Xóa logo cũ nếu có
        if ($category->image) {
            \Storage::delete('public/' . $category->image);
        }

        $validatedData['image'] = $request->file('image')->store('image', 'public');
    }

    // Cập nhật dữ liệu
    $category->update($validatedData);

    return redirect()->route('admin.category')->with('success', 'Category updated successfully!');
}

}