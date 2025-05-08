<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    public function add_brand(){
        $user = Auth::User();
        return view('admin.crud_brand.add_brand',compact('user'));
    }

    public function list_brand()
{
    $user = Auth::User();
    $brands = Brand::all(); // Lấy tất cả bản ghi từ bảng brands
    return view('admin.crud_brand.list_brand', compact('brands','user'));
}


// add brand
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            //code...
            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
            }
    
            Brand::create($validatedData);
    
            return redirect()->route('admin.brand')->with('success', 'Brand added successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error' => 'An error occurred while creating the brand. Please try again.']);
        }
       
    }


    // kiểm tra có có brand có trong product ko
    public function products()
{
    return $this->hasMany(Product::class, 'brand_id');
}

    //xóa brand
    public function destroy($id)
{
    // Tìm Brand theo ID
    $brand = Brand::findOrFail($id);

    // Kiểm tra nếu Brand có sản phẩm liên quan
    if ($brand->products()->exists()) {
        return redirect()->route('admin.brand')->with('error', 'Cannot delete brand as it has associated products.');
    }

    // Nếu Brand có logo, xóa file logo khỏi storage
    if ($brand->logo) {
        Storage::delete('public/' . $brand->logo);
    }

    // Xóa Brand
    $brand->delete();

    // Chuyển hướng với thông báo thành công
    return redirect()->route('admin.brand')->with('success', 'Brand deleted successfully!');
}

    public function edit($id)
    {
        // Tìm Brand theo ID
        $user = Auth::User();
        $brand = Brand::findOrFail($id);

        // Trả về view edit với dữ liệu của Brand
        return view('admin.crud_brand.update_brand', compact('brand','user'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý logo
        if ($request->hasFile('logo')) {
            // Xóa logo cũ nếu có
            if ($brand->logo) {
                Storage::delete('public/' . $brand->logo);
            }

            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Cập nhật dữ liệu
        $brand->update($validatedData);

        return redirect()->route('admin.brand')->with('success', 'Brand updated successfully!');
    }
}
