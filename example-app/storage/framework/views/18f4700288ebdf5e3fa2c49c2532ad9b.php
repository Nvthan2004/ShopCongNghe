<?php $__env->startSection('content'); ?>

<div class="container py-5">

    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>


    <div class="cart-container mb-5">
        <h2 class="cart-header text-center mb-0">
            <i class="fas fa-shopping-cart me-2"></i>Giỏ Hàng Của Bạn
        </h2>

        <div class="row g-0">
            <div class="col-lg-8 p-4 border-end">
                <!-- Sản phẩm trong giỏ hàng -->
                <?php if($cartItems->isEmpty()): ?>
                <p class="text-center">Giỏ hàng của bạn trống!</p>
                <?php else: ?>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card product-card mb-3" id="cart-item-<?php echo e($item->id_product); ?>">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="product-img">
                                    <img src="<?php echo e(asset('storage/' . $item->product->image)); ?>"
                                        alt="<?php echo e($item->product->name); ?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mb-1"><?php echo e($item->product->name); ?></h5>
                                <span class="badge-product mb-2"><?php echo e($item->product->category->name ?? 'N/A'); ?></span>
                            </div>
                            <div class="col-md-2 text-md-center">
                                <span class="fw-bold item-price" data-price="<?php echo e($item->product->price); ?>">
                                    <?php echo e(number_format($item->product->price, 0, ',', '.')); ?> ₫
                                </span>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <button class="btn btn-outline-secondary btn-circle me-2 quantity-decrease" 
                                         data-user-id="<?php echo e($item->id_user); ?>" data-product-id="<?php echo e($item->id_product); ?>">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="form-control quantity-input" value="<?php echo e($item->soluong); ?>"
                                        min="1" data-user-id="<?php echo e($item->id_user); ?>" data-product-id="<?php echo e($item->id_product); ?>"
                                        onchange="updateQuantity('<?php echo e($item->id_user); ?>', '<?php echo e($item->id_product); ?>', this)">
                                    <button class="btn btn-outline-secondary btn-circle ms-2 quantity-increase"
                                         data-user-id="<?php echo e($item->id_user); ?>" data-product-id="<?php echo e($item->id_product); ?>">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form
                                    action="<?php echo e(route('cart.delete', ['userId' => auth()->id(), 'productId' => $item->id_product])); ?>"
                                    method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                        <i class="fas fa-trash-alt me-1"></i> Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="<?php echo e(route('user.product_view')); ?>" class="continue-shopping">
                        <i class="fas fa-arrow-left me-2"></i>Tiếp tục mua sắm
                    </a>
                </div>
            </div>

            <div class="col-lg-4 p-4">
                <!-- Tóm tắt đơn hàng -->
                <div class="summary-card p-4">
                    <h4 class="mb-3">Tóm Tắt Đơn Hàng</h4>

                    <div class="d-flex justify-content-between mb-2">
                       <span>Tổng sản phẩm (<span id="total-items"><?php echo e($cartItems->sum('soluong')); ?></span>)</span>
                        <span id="subtotal"><?php echo e(number_format($cartItems->sum(fn($item) => $item->product->price * $item->soluong), 0, ',', '.')); ?>

                            ₫</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Phí vận chuyển</span>
                        <span id="shipping-fee">30,000 ₫</span>
                    </div>

                    <div class="divider"></div>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>Tổng cộng</span>
                        <span class="text-primary" id="grand-total">
                            <?php echo e(number_format($cartItems->sum(fn($item) => $item->product->price * $item->soluong) + 30000, 0, ',', '.')); ?>

                            ₫
                        </span>
                    </div>

                    <button class="btn btn-primary w-100 checkout-btn">
                        <i class="fas fa-lock me-2"></i>Đặt Hàng
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sản phẩm tương tự  -->
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="mb-4">Có thể bạn sẽ thích</h4>
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/api/placeholder/300/200" class="card-img-top" alt="Sản phẩm gợi ý">
                        <div class="card-body">
                            <h6 class="card-title">Áo Khoác Denim Unisex</h6>
                            <p class="card-text text-primary fw-bold">399,000 ₫</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/api/placeholder/300/200" class="card-img-top" alt="Sản phẩm gợi ý">
                        <div class="card-body">
                            <h6 class="card-title">Quần Jeans Skinny</h6>
                            <p class="card-text text-primary fw-bold">459,000 ₫</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/api/placeholder/300/200" class="card-img-top" alt="Sản phẩm gợi ý">
                        <div class="card-body">
                            <h6 class="card-title">Đồng hồ thông minh</h6>
                            <p class="card-text text-primary fw-bold">1,299,000 ₫</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="/api/placeholder/300/200" class="card-img-top" alt="Sản phẩm gợi ý">
                        <div class="card-body">
                            <h6 class="card-title">Tai nghe không dây</h6>
                            <p class="card-text text-primary fw-bold">699,000 ₫</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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

    // Cập nhật tổng cộng (bao gồm phí vận chuyển 30,000 ₫)
    const shippingFee = 30000;
    document.getElementById('grand-total').textContent = formatCurrency(totalPrice + shippingFee);
}

// Định dạng tiền tệ
function formatCurrency(amount) {
    return new Intl.NumberFormat('vi-VN', { style: 'decimal' }).format(amount) + ' ₫';
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/user/cart.blade.php ENDPATH**/ ?>