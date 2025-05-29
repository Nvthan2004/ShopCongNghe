<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function view_cart()
    {
        // $cart = 
        // $user = Auth::user();
        // Trả về view home_admin.blade.php từ admin/crud
        return view('user.cart');
    }
    // CartController.php
// public function view_art()
// {
//     $userId = auth()->id();
//     $cartItems = Cart::where('id_user', $userId)->with('product')->get();
    
//     // Tính tổng số lượng sản phẩm
//     $totalQuantity = $cartItems->sum('soluong');
    
//     return view('cart.index', [
//         'cartItems' => $cartItems,
//         'totalQuantity' => $totalQuantity
//     ]);
// }
// CartController.php
public function getCartCount()
{
    if (!auth()->check()) {
        return response()->json(['success' => false, 'message' => 'Không đăng nhập']);
    }
    
    $count = Cart::where('id_user', auth()->id())->sum('soluong');
    
    return response()->json(['success' => true, 'count' => $count]);
}

    // them cart
public function addToCart(Request $request)
{
    // Kiểm tra nếu đã đăng nhập
    if (!auth()->check()) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để thêm vào giỏ hàng.']);
        }
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng.');
    }

    $id_user = auth()->id();
    $id_product = $request->input('product_id');

    // Kiểm tra sản phẩm có tồn tại không
    $product = Product::find($id_product);
    if (!$product) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    }

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $cartItem = Cart::where('id_user', $id_user)
                    ->where('id_product', $id_product)
                    ->first();

    if ($cartItem) {
        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        $cartItem->increment('soluong');
    } else {
        // Nếu chưa có, thêm mới
        Cart::create([
            'id_user' => $id_user,
            'id_product' => $id_product,
            'soluong' => 1,
        ]);
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng
    $totalQuantity = Cart::where('id_user', $id_user)->sum('soluong');

    // Kiểm tra nếu là Ajax request
    if ($request->ajax()) {
        return response()->json([
            'success' => true, 
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
            'count' => $totalQuantity
        ]);
    }

    // Nếu không phải Ajax, redirect như bình thường
    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
}


    // hiển thị cart
public function showCart()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
    }

    $user = Auth::user();
    $id_user = auth()->id();

    // Lấy danh sách cart của user
    $cartItems = Cart::where('id_user', $id_user)->get();

    foreach ($cartItems as $item) {
        // Kiểm tra sản phẩm có tồn tại không
        $product = Product::find($item->id_product);
        if (!$product) {
            // Nếu không tồn tại thì xóa mục cart đó
            Cart::where('id_user', $id_user)
                ->where('id_product', $item->id_product)
                ->delete();
        }
    }

    // Sau khi xóa những mục không hợp lệ, lấy lại danh sách cart kèm sản phẩm
    $cartItems = Cart::where('id_user', $id_user)
                          ->with('product')
                          ->get();

    return view('user.cart', compact('cartItems', 'user'));
}

public function updateQuantity(Request $request, $user_id, $product_id)
{
    // Validate input
    $request->validate([
        'soluong' => 'required|integer|min:1|max:100',
    ]);

    $newQuantity = $request->input('soluong');

    // Sử dụng Query Builder để chỉ cập nhật bản ghi cụ thể
    $updated = DB::table('carts')
        ->where('id_user', $user_id)
        ->where('id_product', $product_id)
        ->update(['soluong' => $newQuantity]);

    if (!$updated) {
    return response()->json([
        'success' => false,
        'reload' => true,
        'message' => 'Không tìm thấy sản phẩm trong giỏ hàng. Trang sẽ được tải lại để đồng bộ.'
    ], 200);
}

    // Lấy thông tin sản phẩm để trả về
    $product = DB::table('products')->where('id', $product_id)->first();
    
    // Trả về dữ liệu cập nhật mới
    return response()->json([
        'success' => true, 
        'message' => 'Cập nhật thành công.',
        'data' => [
            'quantity' => $newQuantity,
            'price' => $product->price,
            'subtotal' => $product->price * $newQuantity
        ]
    ]);
}





public function delete($userId, $productId)
{
    try {
        // Kiểm tra xem sản phẩm có trong giỏ hàng hay không
        $exists = DB::table('carts')
            ->where('id_user', $userId)
            ->where('id_product', $productId)
            ->exists();

        if (!$exists) {
            // Nếu sản phẩm không tồn tại trong giỏ hàng
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }

        // Xóa sản phẩm khỏi giỏ hàng
        DB::table('carts')
            ->where('id_user', $userId)
            ->where('id_product', $productId)
            ->delete();

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa thành công.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
    }
}









}