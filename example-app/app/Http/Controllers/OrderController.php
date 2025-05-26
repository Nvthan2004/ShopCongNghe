<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{

    //xóa đơn
    public function destroy($id)
{
    try {
        // Bắt đầu transaction để đảm bảo dữ liệu nhất quán
        DB::beginTransaction();

        // Tìm và xóa các item liên quan đến đơn hàng
        $order = Order::with('items')->findOrFail($id);
        $order->items()->delete();

        // Xóa đơn hàng
        $order->delete();

        // Commit transaction
        DB::commit();

        return redirect()->route('oder.admin.list')->with('success', 'Đơn hàng đã được xóa thành công.');
    } catch (\Exception $e) {
        // Rollback transaction nếu có lỗi
        DB::rollBack();

        return redirect()->route('oder.admin.list')->with('error', 'Có lỗi xảy ra khi xóa đơn hàng.');
    }
}

    //xác nhận đơn hàng
    public function confirmOrder($id)
    {
        // Tìm đơn hàng
        $order = Order::findOrFail($id);

        // Kiểm tra trạng thái hiện tại
        if ($order->status !== Order::STATUS_PROCESSING) {
            return redirect()->back()->with('error', 'Chỉ có thể xác nhận các đơn hàng đang xử lý.');
        }

        // Cập nhật trạng thái đơn hàng
        $order->update([
            'status' => Order::STATUS_COMPLETED,
        ]);

        return redirect()->back()->with('success', 'Đơn hàng đã được xác nhận thành công.');
    }

 public function show_oder($id)
{
    // Lấy thông tin order từ database
    $order = Order::with('items.product')->findOrFail($id);

    // Tính toán subtotal, tax, shipping, và total (nếu cần)
    $subtotal = $order->items->sum(function ($item) {
        return $item->quantity * $item->price;
    });
    $total = $subtotal;

    // Gọi API để lấy tên tỉnh/thành phố
    $cityName = 'Không xác định';
    if ($order->city_code) {
        $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/');
        if ($response->successful()) {
            $provinces = $response->json();
            foreach ($provinces as $province) {
                if ($province['code'] == $order->city_code) {
                    $cityName = $province['name'];
                    break;
                }
            }
        }
    }

    // Truyền dữ liệu sang view
    return view('admin.crud_order.view_order', [
        'order' => $order,
        'subtotal' => $subtotal,
        'total' => $total,
        'cityName' => $cityName, // Truyền tên tỉnh/thành phố sang view
    ]);
}



    public function adminOrderList(Request $request)
{
    $statusFilter = $request->query('status', ''); // trạng thái lọc, có thể '', 'pending', 'completed', 'cancelled'

    $query = Order::query()->with('user'); // giả sử mỗi order có user (khách hàng)

    if (in_array($statusFilter, ['processing', 'completed', 'cancelled'])) {
        $query->where('status', $statusFilter);
    }

    // Sắp xếp ngày mới nhất
    $query->orderBy('created_at', 'desc');

    // Phân trang 5 đơn / trang
    $orders = $query->paginate(5)->withQueryString();

    // Đếm số lượng cho các trạng thái
    $countPending = Order::where('status', 'processing')->count();
    $countCompleted = Order::where('status', 'completed')->count();
    $countCancelled = Order::where('status', 'cancelled')->count();
    $countAll = Order::count();

    return view('admin.crud_order.list_order', compact('orders', 'statusFilter', 'countPending', 'countCompleted', 'countCancelled', 'countAll'));
}


    public function cancelOrder($orderId)
{
    $user = Auth::user();

    // Tìm đơn hàng của người dùng hiện tại
    $order = Order::where('id', $orderId)
        ->where('user_id', $user->id)
        ->firstOrFail();

    // Kiểm tra trạng thái đơn hàng trước khi hủy
    if ($order->status !== Order::STATUS_PROCESSING) {
        return redirect()->back()->with('error', 'Chỉ có thể hủy đơn hàng đang xử lý.');
    }

    // Cập nhật trạng thái đơn hàng thành "Đã hủy"
    $order->status = Order::STATUS_CANCELLED;
    $order->save();

    return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
}


    public function orderDetails($orderId)
{
    $user = Auth::user();
    $order = Order::with('items.product')
        ->where('id', $orderId)
        ->where('user_id', $user->id)
        ->firstOrFail();

    // Lấy city_code từ thông tin đơn hàng
    $cityCode = $order->city_code; // Giả sử 'shipping_city_code' là cột trong bảng orders

    // Gọi API để lấy thông tin tỉnh/thành phố
    $cityName = 'Không tìm thấy';
    try {
        $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/');
        if ($response->successful()) {
            $provinces = $response->json();
            foreach ($provinces as $province) {
                if ($province['code'] == $cityCode) {
                    $cityName = $province['name'];
                    break;
                }
            }
        } else {
            $cityName = 'Không thể kết nối API';
        }
    } catch (\Exception $e) {
        $cityName = 'Lỗi khi gọi API';
    }

    return view('user.user_view_oder', compact('order', 'user', 'cityName'));
}


public function list_oders(Request $request)
{
    $user = Auth::user();

    // Lấy trạng thái lọc từ query param, mặc định là 'all'
    $statusFilter = $request->query('status', 'all');

    // Tạo query cơ bản lấy đơn hàng của user, eager load items.product
    $query = Order::with('items.product')->where('user_id', $user->id)->orderBy('created_at', 'desc');

    // Nếu status khác 'all', thêm điều kiện lọc
    if (in_array($statusFilter, [
        Order::STATUS_PROCESSING,
        Order::STATUS_COMPLETED,
        Order::STATUS_CANCELLED
    ])) {
        $query->where('status', $statusFilter);
    }

    // Phân trang, mỗi trang 5 đơn hàng
    $orders = $query->paginate(5)->withQueryString();

    // Kiểm tra nếu không có đơn hàng nào
    $noOrders = $orders->isEmpty();

    // Đếm số lượng đơn hàng theo trạng thái (không lọc)
    $processingCount = Order::where('user_id', $user->id)
        ->where('status', Order::STATUS_PROCESSING)
        ->count();
    $completedCount = Order::where('user_id', $user->id)
        ->where('status', Order::STATUS_COMPLETED)
        ->count();
    $cancelledCount = Order::where('user_id', $user->id)
        ->where('status', Order::STATUS_CANCELLED)
        ->count();

    // Tổng giá trị tất cả đơn hàng (không lọc)
    $totalValue = Order::where('user_id', $user->id)
        ->sum('total_price');

    return view('user.user_oder_list', compact(
        'orders',
        'user',
        'processingCount',
        'completedCount',
        'cancelledCount',
        'totalValue',
        'statusFilter',
        'noOrders'
    ));
}




    public function store(Request $request)
{
    // Lấy danh sách mã tỉnh thành từ API
    $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/');
    $provinces = $response->json();

    // Lấy danh sách mã tỉnh thành hợp lệ
    $validCityCodes = collect($provinces)->pluck('code')->toArray();

    // Xác thực dữ liệu
    $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName'  => 'required|string|max:255',
        'email'     => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'], // Email phải kết thúc bằng @gmail.com
        'phone'     => ['required', 'regex:/^0[0-9]{9,10}$/'], // Bắt đầu bằng 0, 10 hoặc 11 số
        'city'      => 'required',
        'address'   => 'required|string|max:500',
    ], [
        'email.regex'    => 'Email phải kết thúc bằng @gmail.com.',
        'phone.required' => 'Số điện thoại không được để trống.',
        'phone.regex'    => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng 0 và có 10 hoặc 11 chữ số.',
        'city.required'  => 'Tỉnh/Thành phố không được để trống.',
    ]);

    // Kiểm tra mã tỉnh thành hợp lệ
    if (!in_array($request->city, $validCityCodes)) {
        return back()->withErrors(['city' => 'Mã tỉnh thành không hợp lệ.']);
    }

    $user = Auth::user();

    // Lấy giỏ hàng hiện tại của user
    $carts = Cart::with('product')->where('id_user', $user->id)->get();

    if ($carts->isEmpty()) {
        // Trả về thông báo đơn hàng đang được xử lý nếu giỏ hàng trống
        return redirect()->route('user.carts')
            ->with('info', 'Đơn hàng này đang được xử lý.');
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
            'status' => Order::STATUS_PROCESSING,
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

        return redirect()->route('user.carts')
            ->with('success', 'Đơn hàng của bạn đang được xử lý và sẽ sớm hoàn tất!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Có lỗi xảy ra khi tạo đơn hàng: ' . $e->getMessage()]);
    }
}

}
