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


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Brand::create($validatedData);

        return redirect()->route('admin.brand')->with('success', 'Brand added successfully!');
    }
}
