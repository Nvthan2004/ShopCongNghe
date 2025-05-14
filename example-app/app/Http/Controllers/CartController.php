<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
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

    // them cart
    public function addToCart(Request $request)
    {
        // Kiểm tra nếu đã đăng nhập
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng.');
        }

        $id_user = auth()->id();
        $id_product = $request->input('product_id');

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('id_user', $id_user)
                        ->where('id_product', $id_product)
                        ->first();

                        if ($cartItem) {
                            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
                            Cart::where('id_user', $id_user)
                                ->where('id_product', $id_product)
                                ->update(['soluong' => $cartItem->soluong + 1]);
                        } else {
                            // Nếu chưa có, thêm mới
                            Cart::create([
                                'id_user' => $id_user,
                                'id_product' => $id_product,
                                'soluong' => 1,
                            ]);
                        }
                        

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    // hiển thị cart
    public function showCart()
{
    // Kiểm tra người dùng đã đăng nhập
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
    }

    $user = Auth::user();
    $id_user = auth()->id();

    // Lấy thông tin giỏ hàng của người dùng hiện tại
    $cartItems = Cart::where('id_user', $id_user)
                     ->with('product') // Load thông tin sản phẩm liên quan
                     ->get();

    return view('user.cart', compact('cartItems','user'));
}

public function updateQuantity(Request $request, $user_id, $product_id)
{
    // Validate input
    $request->validate([
        'soluong' => 'required|integer|min:1',
    ]);

    $newQuantity = $request->input('soluong');

    // Kiểm tra xem giỏ hàng có chứa sản phẩm của người dùng hay không
    // QUAN TRỌNG: Phải khớp chính xác cả user_id và product_id
    $cartItem = Cart::where('id_user', $user_id)
                    ->where('id_product', $product_id)
                    ->first();

    if (!$cartItem) {
        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.'], 404);
    }

    // Cập nhật số lượng của sản phẩm cụ thể - CHỈ CẬP NHẬT SẢN PHẨM ĐƯỢC CHỈ ĐỊNH
    $cartItem->soluong = $newQuantity;
    $cartItem->save();

    // Trả về dữ liệu cập nhật mới để cập nhật UI
    return response()->json([
        'success' => true, 
        'message' => 'Cập nhật thành công.',
        'data' => [
            'quantity' => $newQuantity,
            'price' => $cartItem->product->price,
            'subtotal' => $cartItem->product->price * $newQuantity
        ]
    ]);
}





public function delete($userId, $productId)
{
    try {
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