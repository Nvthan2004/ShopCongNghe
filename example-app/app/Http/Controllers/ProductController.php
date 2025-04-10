<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Trang danh sách sản phẩm
    public function list_product()
    {
        $products = Product::all();
        return view('admin.crud_product.list_product', compact('products'));
    }

    // Trang thêm sản phẩm
    public function add_product()
    {
        return view('admin.crud_product.add_product');
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công!');
    }

    // Trang chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.crud_product.update_product', compact('product'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validatedData);

        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Xóa sản phẩm thành công!');
    }
}