<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
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
