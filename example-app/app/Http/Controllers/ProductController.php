<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{

    //sản phẩm mới
    public function product_new()
{
    $featuredProducts = Product::orderBy('created_at', 'desc')->take(8)->get(); // Lấy 8 sản phẩm mới nhất
    return view('user.index', compact('featuredProducts'));
}
    // chi tiết sản phẩm
    public function show_product($id)
{
    $user = Auth::user();
    // Tìm sản phẩm theo ID
    $product = Product::findOrFail($id);

    // Lấy danh sách sản phẩm liên quan (có thể dựa trên danh mục hoặc điều kiện khác)
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $id)
        ->take(4) // Lấy 4 sản phẩm liên quan
        ->get();

    // Trả về view với dữ liệu
    return view('user.detail_product', compact('product', 'relatedProducts','user'));
}

  public function product_user_view(Request $request)
{
    $user = Auth::user();

    // Lấy danh sách thương hiệu và loại sản phẩm
    $brands = Brand::all();
    $categories = Category::all();

    // Khởi tạo query để lọc sản phẩm
    $query = Product::query();

    // Kiểm tra và lọc theo loại sản phẩm
    if ($request->filled('category')) {
        $categoryId = $request->category;

        // Kiểm tra loại sản phẩm có tồn tại
        if ($categories->contains('id', $categoryId)) {
            $query->where('category_id', $categoryId);
        } else {
            return redirect()->route('user.product_view')->withErrors('Loại sản phẩm không hợp lệ.');
        }
    }

    // Kiểm tra và lọc theo thương hiệu
    if ($request->filled('brand')) {
        $brandId = $request->brand;

        // Kiểm tra thương hiệu có tồn tại
        if ($brands->contains('id', $brandId)) {
            $query->where('brand_id', $brandId);
        } else {
            return redirect()->route('user.product_view')->withErrors('Thương hiệu không hợp lệ.');
        }
    }

    // Kiểm tra và lọc theo khoảng giá
    if ($request->filled('price_range')) {
        $priceRange = $request->price_range;

        // Xác định khoảng giá hợp lệ
        $validPriceRanges = [
            '0-5000000',
            '5000000-10000000',
            '10000000-20000000',
            '20000000-100000000',
        ];

        if (in_array($priceRange, $validPriceRanges)) {
            [$minPrice, $maxPrice] = explode('-', $priceRange);
            $query->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
        } else {
            return redirect()->route('user.product_view')->withErrors('Khoảng giá không hợp lệ.');
        }
    }

    // Lấy danh sách sản phẩm đã lọc và phân trang
    $products = $query->paginate(9);

    return view('user.view_products', compact('products', 'brands', 'categories', 'user'));
}

    

    // Trang danh sách sản phẩm
    public function list_product()
    {
        $user = Auth::user();
         // Lấy danh sách sản phẩm với phân trang, mỗi trang hiển thị 10 sản phẩm
    $products = Product::with(['category', 'brand'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.crud_product.list_product', compact('products','user'));
    }

    // Trang thêm sản phẩm
    public function add_product()
    {
        $user = Auth::User();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.crud_product.add_product', compact('categories', 'brands','user'));
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
 $duplicate = Product::where('name', $request->input('name'))
        ->where('category_id', $categoryId)
        ->where('brand_id', $brandId)
        ->first();

    if ($duplicate) {
        return back()->withErrors(['Sản phẩm đã tồn tại trong hệ thống.'])->withInput();
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
        $user = Auth::User();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
    
        return view('admin.crud_product.update_product', compact('product', 'categories', 'brands','user'));
    }
    

    // Cập nhật sản phẩm
    public function update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
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
        $product->description = $validatedData['description'];
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
    //tim kiem
    
    public function search(Request $request)
    {
        $user = Auth::User();
        $search = $request->input('search');
    
        $products = Product::where('name', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->paginate(6); // Mỗi trang 6 sản phẩm
    
        return view('user.single', [
            'products' => $products,
            'search' => $search 
        ], compact('user'));
    }
    

          
}