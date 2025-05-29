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
    $userId = auth()->id();

    // Lấy danh sách sản phẩm từ giỏ hàng của người dùng
    $carts = Cart::with('product')
        ->where('id_user', $userId)
        ->get();

    // Kiểm tra nếu giỏ hàng trống
    if ($carts->isEmpty()) {
        return back()->with('error', 'Giỏ hàng của bạn trống. Không thể thực hiện thanh toán.');
    }

    // Kiểm tra sản phẩm nào trong giỏ hàng không tồn tại
    foreach ($carts as $cart) {
        if (!$cart->product) {
            return back()->with('error', 'Một số sản phẩm trong giỏ hàng không còn tồn tại.');
        }
    }

    // Tính tổng giá trị đơn hàng
    $totalPrice = $carts->reduce(function ($total, $cart) {
        return $total + ($cart->product->price * $cart->soluong);
    }, 0);

    // Gửi yêu cầu API để lấy danh sách tỉnh/thành phố
    $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/');

    $cities = [];
    if ($response->successful()) {
        $cities = $response->json();
    } else {
        return back()->withErrors(['error' => 'Không thể lấy danh sách tỉnh/thành phố']);
    }

    return view('user.payment', [
        'carts' => $carts,
        'totalPrice' => $totalPrice,
        'cities' => $cities,
        'user' => $user,
    ]);
}


}
