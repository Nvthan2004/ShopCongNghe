<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{

    // hiển thị theo trang chủ
    public function product_user_view(Request $request)
    {
        $brands = Brand::all(); // Lấy tất cả thương hiệu
        $categories = Category::all(); // Lấy tất cả loại sản phẩm
    
        $query = Product::query();
    
        // Lọc theo loại sản phẩm
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        // Lọc theo thương hiệu
        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }
    
        // Lọc theo khoảng giá
        if ($request->filled('price_range')) {
            [$minPrice, $maxPrice] = explode('-', $request->price_range);
            $query->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
        }
    
        // Lấy danh sách sản phẩm đã lọc và phân trang
        $products = $query->paginate(9);
    
        return view('user.view_products', compact('products', 'brands', 'categories'));
    }
    

    // Trang danh sách sản phẩm
    public function list_product()
    {
         // Lấy danh sách sản phẩm với phân trang, mỗi trang hiển thị 10 sản phẩm
    $products = Product::with(['category', 'brand'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.crud_product.list_product', compact('products'));
    }

    // Trang thêm sản phẩm
    public function add_product()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.crud_product.add_product', compact('categories', 'brands'));
    }

    // Thêm sản phẩm mới
    public function create_product(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Lấy ID từ tê và brandn category
    $categoryId = Category::where('id', $request->input('category'))->value('id');
    $brandId = Brand::where('id', $request->input('brand'))->value('id');

    if (!$categoryId || !$brandId) {
        return back()->withErrors(['category' => 'Danh mục hoặc thương hiệu không hợp lệ.']);
    }

    // Gán ID vào dữ liệu được validate
    $validatedData['category_id'] = $categoryId;
    $validatedData['brand_id'] = $brandId;

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('products', 'public');
    }

    $validatedData['rating'] = 0; // Giá trị mặc định

    Product::create($validatedData);

    return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công!');
}



    // Trang chỉnh sửa sản phẩm
    public function edit_product($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
    
        return view('admin.crud_product.update_product', compact('product', 'categories', 'brands'));
    }
    

    // Cập nhật sản phẩm
    public function update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Lấy ID từ tên category và brand
        $categoryId = Category::where('name', $request->input('category'))->value('id');
        $brandId = Brand::where('name', $request->input('brand'))->value('id');
    
        if (!$categoryId || !$brandId) {
            return back()->withErrors(['category' => 'Danh mục hoặc thương hiệu không hợp lệ.']);
        }
    
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->category_id = $categoryId;
        $product->brand_id = $brandId;
    
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            // Lưu ảnh mới
            $product->image = $request->file('image')->store('products', 'public');
        }
    
        $product->save();
    
        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        // Xóa ảnh nếu có
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
    
        $product->delete();
    
        return redirect()->route('admin.product')->with('success', 'Xóa sản phẩm thành công!');
    }
    
}