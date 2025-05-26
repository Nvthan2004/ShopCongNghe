@extends('user.dashboard_user')

@section('content')

<style>
.container {
    max-width: 1000px;
    margin: 0 auto;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.2);
    color: blue;
    padding: 12px 20px;
    border-radius: 25px;
    text-decoration: none;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.back-button:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateX(-5px);
}

.header {
    text-align: center;
    margin-bottom: 30px;
    color: blue;
}

.header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.order-status {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.9);
    padding: 10px 20px;
    border-radius: 25px;
    margin-bottom: 10px;
}

.status-badge {
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-completed {
    background: linear-gradient(135deg, #55efc4, #00b894);
    color: #00695c;
}

.order-timeline {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.timeline-item {
    position: relative;
    margin-bottom: 25px;
    padding-left: 40px;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #667eea;
    border: 3px solid white;
    box-shadow: 0 0 0 3px #667eea;
}

.timeline-item.completed::before {
    background: #00b894;
    box-shadow: 0 0 0 3px #00b894;
}

.timeline-content {
    background: white;
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.timeline-title {
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.timeline-date {
    color: #666;
    font-size: 0.9rem;
}

.main-content {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 25px;
}

.content-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.card-title {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-info {
    display: grid;
    gap: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #f8f9ff;
    border-radius: 10px;
    border-left: 4px solid #667eea;
}

.info-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
}

.info-content {
    flex: 1;
}

.info-label {
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 3px;
}

.info-value {
    font-weight: 600;
    color: #333;
}

.product-item {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    background: white;
    border-radius: 15px;
    margin-bottom: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.product-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.product-image {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid #f0f0f0;
}

.product-info {
    flex: 1;
}

.product-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.product-details {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 8px;
}

.product-quantity {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 600;
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #27ae60;
    text-align: right;
}

.order-summary {
    background: linear-gradient(135deg, #f8f9ff, #e8f0fe);
    border-radius: 15px;
    padding: 25px;
    margin-top: 25px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.summary-row:last-child {
    border-bottom: none;
    font-size: 1.3rem;
    font-weight: bold;
    color: #27ae60;
    padding-top: 20px;
    margin-top: 15px;
    border-top: 2px solid #667eea;
}

.shipping-info {
    background: linear-gradient(135deg, #fff3e0, #ffe0b2);
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
}

.shipping-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    font-weight: 600;
    color: #e65100;
}

.action-buttons {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.action-btn {
    flex: 1;
    padding: 15px 25px;
    border: none;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.btn-secondary {
    background: transparent;
    color: #667eea;
    border: 2px solid #667eea;
}

.btn-danger {
    background: linear-gradient(135deg, #fd79a8, #e84393);
    color: white;
}

.action-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.order-notes {
    background: #fff8e1;
    border-left: 4px solid #ffc107;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
}

.notes-title {
    font-weight: 600;
    color: #f57c00;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

@media (max-width: 768px) {
    .main-content {
        grid-template-columns: 1fr;
    }

    .header h1 {
        font-size: 2rem;
    }

    .product-item {
        flex-direction: column;
        text-align: center;
    }

    .product-price {
        text-align: center;
    }

    .action-buttons {
        flex-direction: column;
    }

    .container {
        padding: 10px;
    }
}

.fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="container">
    <a href="{{ route('oder.list') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
        Quay lại danh sách đơn hàng
    </a>

    <div class="header">
        <h1><i class="fas fa-receipt"></i> Chi Tiết Đơn Hàng #{{ $order->id }}</h1>
        <div class="order-status">
            <span class="status-badge status-{{ $order->status }}"> @if($order->status ===
                App\Models\Order::STATUS_PROCESSING)
                <span class="badge bg-warning">Đang xử lý</span>
                @elseif($order->status === App\Models\Order::STATUS_COMPLETED)
                <span class="badge bg-success">Hoàn thành</span>
                @elseif($order->status === App\Models\Order::STATUS_CANCELLED)
                <span class="badge bg-danger">Đã hủy</span>
                @endif</span>
            <span style="color: #666;">Đặt hàng ngày {{ $order->created_at->format('d/m/Y') }}</span>
        </div>
    </div>

    <div class="main-content">
        <div class="content-card fade-in">
            <h2 class="card-title">
                <i class="fas fa-box"></i>
                Sản phẩm đã đặt
            </h2>

            @foreach ($order->items as $item)
            <div class="product-item">
                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                    class="product-image">
                <div class="product-info">
                    <div class="product-name">{{ $item->product->name }}</div>
                    <div class="product-details">{{ $item->product->description }}</div>
                    <div class="product-quantity">
                        <i class="fas fa-cube"></i>
                        Số lượng: {{ $item->quantity }}
                    </div>
                </div>
                <div class="product-price">{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} ₫
                </div>
            </div>
            @endforeach

            <div class="order-summary">
                <div class="summary-row">
                    <span>Tạm tính:</span>
                    <span>{{ number_format($order->total_price, 0, ',', '.') }} ₫</span>
                </div>
                <div class="summary-row">
                    <span>Phí vận chuyển:</span>
                    <span>Miễn phí</span>
                </div>
                <div class="summary-row">
                    <span>Tổng cộng:</span>
                    <span>{{ number_format($order->total_price, 0, ',', '.') }} ₫</span>
                </div>
            </div>

            <div class="order-notes">
                <div class="notes-title">
                    <i class="fas fa-sticky-note"></i>
                    Ghi chú đơn hàng
                </div>
                <p></p>
            </div>
        </div>

        <div class="sidebar">
            <div class="content-card fade-in">
                <h3 class="card-title">
                    <i class="fas fa-user"></i>
                    Thông tin khách hàng
                </h3>
                <div class="user-info">
                    <div class="info-item">
                        <div class="info-label">Họ và tên</div>
                        <div class="info-value">{{ $order->first_name}} {{ $order->last_name}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $user->email }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Số điện thoại</div>
                        <div class="info-value">{{ $order->phone }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Địa chỉ giao hàng</div>
                        <div class="info-value"> {{ $cityName }}, {{ $order->address }}</div>
                    </div>
                </div>
            </div>

            <div class="content-card fade-in">

               
                    @if($order->status === App\Models\Order::STATUS_PROCESSING)
                    <div class="action-buttons">
                    <a href="#" class="action-btn btn-secondary">
                        <i class="fas fa-download"></i>
                        Tải hóa đơn
                    </a>
                    <a href="#" class="action-btn btn-secondary">
                        <i class="fas fa-headset"></i>
                        Hỗ trợ
                    </a>
                    </div>
                    @elseif($order->status === App\Models\Order::STATUS_COMPLETED)
                    <div class="action-buttons">
                    <a href="#" class="action-btn btn-primary">
                        <i class="fas fa-redo"></i>
                        Mua lại
                    </a>
                    <a href="#" class="action-btn btn-secondary">
                        <i class="fas fa-download"></i>
                        Tải hóa đơn
                    </a>
                    </div>
                    @elseif($order->status === App\Models\Order::STATUS_CANCELLED)
                    <div class="action-buttons">
                    <a href="#" class="action-btn btn-primary">
                        <i class="fas fa-redo"></i>
                        Mua lại
                    </a>
                    <a href="#" class="action-btn btn-secondary">
                        <i class="fas fa-headset"></i>
                        Hỗ trợ
                    </a>
                    </div>
                    @endif
               
            </div>


        </div>
    </div>
</div>


@endsection