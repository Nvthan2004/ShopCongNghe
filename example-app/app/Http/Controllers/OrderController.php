<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName'  => 'required|string|max:255',
        'email'     => 'required|email',
        'phone'     => ['required', 'regex:/^0[0-9]{9,10}$/'], // Bắt đầu bằng 0, 10 hoặc 11 số
        'city'      => 'required',
        'address'   => 'required|string|max:500',
    ], [
        'phone.required' => 'Số điện thoại không được để trống',
        'phone.regex'    => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng 0 và có 10 hoặc 11 chữ số.',
    ]);

        $user = Auth::user();

        // Lấy giỏ hàng hiện tại của user
        $carts = Cart::with('product')->where('id_user', $user->id)->get();

        if ($carts->isEmpty()) {
            return back()->withErrors(['error' => 'Giỏ hàng của bạn đang trống']);
        }

        // Bắt đầu transaction
        DB::beginTransaction();

        try {
            // Tạo đơn hàng mới
            $order = Order::create([
                'user_id' => $user->id,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'city_code' => $request->city,
                'address' => $request->address,
                'total_price' => $carts->reduce(function ($total, $cart) {
                    return $total + ($cart->product->price * $cart->soluong);
                }, 0),
                'payment_method' => 'Thanh Toán Khi nhận hàng',
                'status' => 'pending',
            ]);

            // Tạo chi tiết đơn hàng (order items)
            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product->id,
                    'quantity' => $cart->soluong,
                    'price' => $cart->product->price,
                ]);
            }

            // Xóa giỏ hàng sau khi tạo đơn
            Cart::where('id_user', $user->id)->delete();

            DB::commit();

            return redirect()->route('user.payment')
    ->with('success', 'Đơn hàng của bạn đang được xử lý và sẽ sớm hoàn tất!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi tạo đơn hàng: ' . $e->getMessage()]);
        }
    }
}
