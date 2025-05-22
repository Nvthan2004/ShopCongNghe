<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function payment()
{
    $user = auth()->user();
    // Lấy id của người dùng hiện tại
    $userId = auth()->id();

    // Lấy danh sách sản phẩm từ giỏ hàng của người dùng
    $carts = Cart::with('product')
        ->where('id_user', $userId)
        ->get();

    // Tính tổng giá trị đơn hàng
    $totalPrice = $carts->reduce(function ($total, $cart) {
        return $total + ($cart->product->price * $cart->soluong);
    }, 0);

    // Gửi yêu cầu API để lấy danh sách tỉnh/thành phố
    $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/');


    $cities = [];
    if ($response->successful()) {
        $cities = $response->json(); // Dữ liệu trả về dạng JSON
    } else {
        // Nếu không lấy được danh sách tỉnh/thành phố, hiển thị lỗi
        return back()->withErrors(['error' => 'Không thể lấy danh sách tỉnh/thành phố']);
    }

    // Truyền cả giỏ hàng và danh sách tỉnh/thành phố sang view
    return view('user.payment', [
        'carts' => $carts,
        'totalPrice' => $totalPrice,
        'cities' => $cities,
        'user' => $user,
    ]);
}

}
