<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function add_brand(){
        return view('admin.crud_brand.add_brand');
    }

    public function list_brand()
{
    $brands = Brand::all(); // Lấy tất cả bản ghi từ bảng brands
    return view('admin.crud_brand.list_brand', compact('brands'));
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


    //xóa brand
    public function destroy($id)
    {
        // Tìm Brand theo ID
        $brand = Brand::findOrFail($id);

        // Nếu Brand có logo, xóa file logo khỏi storage
        if ($brand->logo) {
            \Storage::delete('public/' . $brand->logo);
        }

        // Xóa Brand
        $brand->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.brand')->with('success', 'Brand deleted successfully!');
    }
    public function edit($id)
    {
        // Tìm Brand theo ID
        $brand = Brand::findOrFail($id);

        // Trả về view edit với dữ liệu của Brand
        return view('admin.crud_brand.update_brand', compact('brand'));
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
                \Storage::delete('public/' . $brand->logo);
            }

            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Cập nhật dữ liệu
        $brand->update($validatedData);

        return redirect()->route('admin.brand')->with('success', 'Brand updated successfully!');
    }
}
