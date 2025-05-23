@extends('admin.dashboard_admin')

@section('content')

  <style>
        
        .admin-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-info { background: #17a2b8; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .container {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            max-width: 900px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        
        .order-id {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }
        
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .status.confirmed { background: #d4edda; color: #155724; }
        .status.pending { background: #fff3cd; color: #856404; }
        .status.shipped { background: #d1ecf1; color: #0c5460; }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.4rem;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }
        
        .info-section {
            margin-bottom: 30px;
        }
        
        .user-info {
            background: #f8f9fa;
            padding: 20px;
            border-left: 4px solid #007bff;
            border-radius: 4px;
        }
        
        .user-info div {
            margin-bottom: 10px;
            display: flex;
        }
        
        .user-info strong {
            min-width: 100px;
            color: #495057;
        }
        
        .product-list table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .product-list th {
            background-color: #f8f9fa;
            color: #333;
            padding: 15px 12px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }
        
        .product-list td {
            padding: 15px 12px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }
        
        .product-list tr:hover {
            background-color: #f8f9fa;
        }
        
        .product-item img {
            max-width: 60px;
            max-height: 60px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .product-name {
            font-weight: 500;
        }
        
        .product-sku {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
        }
        
        .quantity {
            text-align: center;
            font-weight: 500;
        }
        
        .price {
            text-align: right;
            font-weight: 500;
        }
        
        .total-section {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .total-final {
            display: flex;
            justify-content: space-between;
            font-size: 1.2rem;
            font-weight: bold;
            padding-top: 10px;
            border-top: 2px solid #ddd;
            margin-top: 10px;
        }
        
        .actions-panel {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            gap: 10px;
        }
        
        .edit-mode .editable {
            background: #fff3cd;
            padding: 2px 5px;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .edit-mode .editable:hover {
            background: #ffeaa7;
        }
        
        @media (max-width: 768px) {
            .admin-actions {
                flex-direction: column;
                gap: 5px;
            }
            
            .order-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .container {
                margin: 10px;
                padding: 15px;
            }
            
            .actions-panel {
                position: static;
                margin-top: 20px;
                justify-content: center;
            }
            
            .product-list table {
                font-size: 14px;
            }
            
            .product-list th,
            .product-list td {
                padding: 10px 8px;
            }
        }
    </style>

<div class="container">
     <a href="{{ route('oder.admin.list') }}" class="btn btn-primary mb-3">← Quay lại danh sách đơn hàng</a>


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <!-- Thông tin đơn hàng -->
    <div class="order-header">
        <h1>Đơn hàng #{{ $order->id }}</h1>
        <p>Trạng thái: 
            <span class="badge status-{{ $order->status }}">
               @if($order->status ===
                App\Models\Order::STATUS_PROCESSING)
                <span class="badge bg-warning">Đang xử lý</span>
                @elseif($order->status === App\Models\Order::STATUS_COMPLETED)
                <span class="badge bg-success">Hoàn thành</span>
                @elseif($order->status === App\Models\Order::STATUS_CANCELLED)
                <span class="badge bg-danger">Đã hủy</span>
                @endif</span>
            </span>
        </p>

        @if ($order->status === App\Models\Order::STATUS_PROCESSING)
        <!-- Nút xác nhận -->
        <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">Xác nhận đơn hàng</button>
        </form>
    @endif
    </div>

    <!-- Thông tin khách hàng -->
    <div class="info-section">
        <h2>Thông tin khách hàng</h2>
        <p><strong>Họ tên:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>tỉnh/thành phố:</strong> {{ $cityName }}</p> <!-- Thêm c -->
        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
    </div>

    <!-- Sản phẩm -->
    <div class="info-section">
        <h2>Sản phẩm</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="60">
                        </td>
                        <td>{{ $item->product->name ?? 'Sản phẩm không xác định' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                        <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tổng tiền -->
    <div class="total-section">
        <h2>Tóm tắt đơn hàng</h2>
        <div class="total-row">
            <span>Tạm tính:</span>
            <span>{{ number_format($subtotal, 0, ',', '.') }} đ</span>
        </div>
        <div class="total-final">
            <strong>Tổng cộng:</strong>
            <strong>{{ number_format($total, 0, ',', '.') }} đ</strong>
        </div>
    </div>
</div>



<script>
let editMode = false;

function editOrder() {
    editMode = !editMode;
    const body = document.body;
    const btn = event.target;
    
    if (editMode) {
        body.classList.add('edit-mode');
        btn.textContent = 'Save';
        btn.className = 'btn btn-success';
    } else {
        body.classList.remove('edit-mode');
        btn.textContent = 'Edit';
        btn.className = 'btn btn-primary';
    }
}



function prevOrder() {
    alert('Loading previous order...');
}

function nextOrder() {
    alert('Loading next order...');
}

// Handle editable fields
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('editable') && editMode) {
        const span = e.target;
        const currentValue = span.textContent;
        const input = document.createElement('input');
        input.type = 'text';
        input.value = currentValue;
        input.style.width = '100%';
        input.style.padding = '4px';
        input.style.border = '1px solid #ddd';
        
        span.parentNode.replaceChild(input, span);
        input.focus();
        
        input.addEventListener('blur', function() {
            span.textContent = input.value;
            input.parentNode.replaceChild(span, input);
        });
        
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                input.blur();
            }
        });
    }
});
</script>

@endsection