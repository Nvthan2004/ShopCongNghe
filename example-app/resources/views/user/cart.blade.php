@extends('user.dashboard_user')

@section('content')

<div class="container py-5">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <div class="cart-container mb-5">
        <h2 class="cart-header text-center mb-0">
            <i class="fas fa-shopping-cart me-2"></i>Giỏ Hàng Của Bạn
        </h2>

        <div class="row g-0">
            <div class="col-lg-8 p-4 border-end">
                <!-- Sản phẩm trong giỏ hàng -->
                @if ($cartItems->isEmpty())
                <p class="text-center">Giỏ hàng của bạn trống!</p>
                @else
                @foreach ($cartItems as $item)
                <div class="card product-card mb-3" id="cart-item-{{ $item->id_product }}">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="product-img">
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mb-1">{{ $item->product->name }}</h5>
                                <span class="badge-product mb-2">{{ $item->product->category->name ?? 'N/A' }}</span>
                            </div>
                            <div class="col-md-2 text-md-center">
                                <span class="fw-bold item-price" data-price="{{ $item->product->price }}">
                                    {{ number_format($item->product->price, 0, ',', '.') }} ₫
                                </span>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <button class="btn btn-outline-secondary btn-circle me-2 quantity-decrease"
                                        data-user-id="{{ $item->id_user }}" data-product-id="{{ $item->id_product }}">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="form-control quantity-input"
                                        value="{{ $item->soluong }}" min="1" data-user-id="{{ $item->id_user }}"
                                        data-product-id="{{ $item->id_product }}"
                                        onchange="updateQuantity('{{ $item->id_user }}', '{{ $item->id_product }}', this)">
                                    <button class="btn btn-outline-secondary btn-circle ms-2 quantity-increase"
                                        data-user-id="{{ $item->id_user }}" data-product-id="{{ $item->id_product }}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form
                                    action="{{ route('cart.delete', ['userId' => auth()->id(), 'productId' => $item->id_product]) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                        <i class="fas fa-trash-alt me-1"></i> Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('user.product_view') }}" class="continue-shopping">
                        <i class="fas fa-arrow-left me-2"></i>Tiếp tục mua sắm
                    </a>
                </div>
            </div>

            <div class="col-lg-4 p-4">
                <!-- Tóm tắt đơn hàng -->
                <div class="summary-card p-4">
                    <h4 class="mb-3">Tóm Tắt Đơn Hàng</h4>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Tổng sản phẩm (<span id="total-items">{{ $cartItems->sum('soluong') }}</span>)</span>
                        <span
                            id="subtotal">{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->soluong), 0, ',', '.') }}
                            ₫</span>
                    </div>


                    <div class="divider"></div>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>Tổng cộng</span>
                        <span class="text-primary" id="grand-total">
                            {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->soluong), 0, ',', '.') }}
                            ₫
                        </span>
                    </div>
                    <a href="{{ $cartItems->isEmpty() ? '#' : route('user.payment') }}"
                        class="btn btn-primary w-100 checkout-btn {{ $cartItems->isEmpty() ? 'disabled' : '' }}"
                        onclick="{{ $cartItems->isEmpty() ? 'alert(\'Giỏ hàng của bạn trống. Không thể thanh toán.\')' : '' }}">
                        <i class="fas fa-lock me-2"></i>Đặt Hàng
                    </a>

                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
// Cập nhật số lượng sản phẩm
function updateQuantity(userId, productId, inputElement) {
    const newQuantity = parseInt(inputElement.value);

    if (newQuantity < 1) {
        alert("Số lượng phải lớn hơn hoặc bằng 1.");
        inputElement.value = 1;
        return;
    }

    // Hiển thị trạng thái đang tải
    const cartItem = document.getElementById(`cart-item-${productId}`);
    if (cartItem) {
        cartItem.style.opacity = '0.7';
    }

    fetch(`/cart/update/${userId}/${productId}`, {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: JSON.stringify({
        soluong: newQuantity,
    }),
})
.then(response => response.json())
.then(data => {
    if (!data.success) {
        alert('Có lỗi xảy ra: ' + data.message);

        // Nếu server yêu cầu reload thì reload lại trang
        if (data.reload) {
            location.reload();
            return;
        }

        if (cartItem) {
            cartItem.style.opacity = '1';
        }
    } else {
        if (cartItem) {
            cartItem.style.opacity = '1';
        }
        // Cập nhật UI chỉ cho sản phẩm cụ thể
        updateCartItemUI(productId, newQuantity);
        // Cập nhật tổng đơn hàng
        updateOrderSummary();
    }
})
.catch(error => {
    console.error('Lỗi:', error);
    alert('Không thể cập nhật số lượng. Vui lòng thử lại sau.');
    if (cartItem) {
        cartItem.style.opacity = '1';
    }
});

}

// Cập nhật UI của một sản phẩm cụ thể
function updateCartItemUI(productId, newQuantity) {
    // Chỉ cập nhật sản phẩm có ID tương ứng
    const cartItem = document.getElementById(`cart-item-${productId}`);
    if (cartItem) {
        const quantityInput = cartItem.querySelector('.quantity-input');
        if (quantityInput) {
            quantityInput.value = newQuantity;
        }
    }
}

// Tính lại tổng tiền và cập nhật tóm tắt đơn hàng
function updateOrderSummary() {
    // Lấy tất cả input số lượng
    const quantityInputs = document.querySelectorAll('.quantity-input');
    let totalItems = 0;
    let totalPrice = 0;

    quantityInputs.forEach(input => {
        const row = input.closest('.product-card');
        const priceElement = row.querySelector('.item-price');
        const price = parseInt(priceElement.getAttribute('data-price'));
        const quantity = parseInt(input.value);

        // Cộng dồn số lượng thực tế của từng sản phẩm
        totalItems += quantity;
        totalPrice += price * quantity;
    });

    // Cập nhật số lượng sản phẩm
    document.getElementById('total-items').textContent = totalItems;

    // Cập nhật giá tạm tính
    document.getElementById('subtotal').textContent = formatCurrency(totalPrice);

    document.getElementById('grand-total').textContent = formatCurrency(totalPrice );
}

// Định dạng tiền tệ
function formatCurrency(amount) {
    return new Intl.NumberFormat('vi-VN', {
        style: 'decimal'
    }).format(amount) + ' ₫';
}

// Sự kiện nút tăng và giảm số lượng
document.addEventListener('DOMContentLoaded', function() {
    // Thêm sự kiện cho nút tăng số lượng
    document.querySelectorAll('.quantity-increase').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            const productId = this.getAttribute('data-product-id');
            const inputElement = this.parentElement.querySelector('.quantity-input');
            inputElement.value = parseInt(inputElement.value) + 1;
            updateQuantity(userId, productId, inputElement);
        });
    });

    // Thêm sự kiện cho nút giảm số lượng
    document.querySelectorAll('.quantity-decrease').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            const productId = this.getAttribute('data-product-id');
            const inputElement = this.parentElement.querySelector('.quantity-input');
            const currentValue = parseInt(inputElement.value);
            if (currentValue > 1) {
                inputElement.value = currentValue - 1;
                updateQuantity(userId, productId, inputElement);
            }
        });
    });
});
</script>
@endsection