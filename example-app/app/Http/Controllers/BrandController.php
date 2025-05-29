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
    $rules = [
        'name' => [
            'required',
            'string',
            'max:100',
            'unique:brands,name',
            'regex:/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/',  // chữ, số, khoảng trắng giữa từ, ko đầu/cuối
        ],
        'slug' => 'nullable|string|max:255',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    $messages = [
        'name.required' => 'Tên thương hiệu là bắt buộc.',
        'name.max' => 'Tên không hợp lệ: chỉ chứa chữ, số và khoảng trắng ở giữa, không vượt quá 100 ký tự.',
        'name.regex' => 'Tên không hợp lệ: chỉ chứa chữ, số, không có ký tự đặc biệt.',
        'name.unique' => 'Tên thương hiệu đã tồn tại! Vui lòng thử lại.',
        'logo.image' => 'Tệp logo phải là hình ảnh.',
        'logo.mimes' => 'Định dạng tệp không hợp lệ',
        'logo.max' => 'Logo không được vượt quá 2MB.',
    ];

    $validator = \Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        $errors = $validator->errors();

        // Chỉ trả về 1 lỗi cho name: ưu tiên lỗi max hoặc regex trước
        if ($errors->has('name')) {
            if ($errors->has('name.max') || $errors->has('name.regex')) {
                return back()->withErrors(['name' => $messages['name.regex']])->withInput();
            }
            if ($errors->has('name.unique')) {
                return back()->withErrors(['name' => $messages['name.unique']])->withInput();
            }
            return back()->withErrors(['name' => $errors->first('name')])->withInput();
        }

        return back()->withErrors($errors)->withInput();
    }

    try {
        if ($request->hasFile('logo')) {
            $request->merge(['logo' => $request->file('logo')->store('logos', 'public')]);
        }

        Brand::create($request->only(['name', 'slug', 'logo']));

        return redirect()->route('admin.brand')->with('success', 'Thêm thương hiệu thành công!');
    } catch (\Throwable $th) {
        return back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi thêm thương hiệu. Vui lòng thử lại.']);
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
    $user = Auth::User();
    $brand = Brand::find($id);

    if (!$brand) {
        return redirect()->route('admin.brand')->with('error', 'Brand not found or already deleted.');
    }

    return view('admin.crud_brand.update_brand', compact('brand', 'user'));
}


   public function update(Request $request, $id)
{
    try {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand')->with('error', 'Brand not found or already deleted.');
        }

        // Validate các trường
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'updated_at' => 'required|date',
        ]);

        // So sánh updated_at
        $formUpdatedAt = new \DateTime($validatedData['updated_at']);
        $dbUpdatedAt = new \DateTime($brand->updated_at);

        if ($formUpdatedAt < $dbUpdatedAt) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Dữ liệu đã bị thay đổi. Vui lòng tải lại trang để cập nhật mới nhất.');
        }

        // Cập nhật logo nếu có
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::delete('public/' . $brand->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        unset($validatedData['updated_at']);
        $brand->update($validatedData);

        return redirect()->route('admin.brand')->with('success', 'Cập nhật thương hiệu thành công!');

    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Dữ liệu không hợp lệ hoặc có lỗi xảy ra!');
    }
}


}
