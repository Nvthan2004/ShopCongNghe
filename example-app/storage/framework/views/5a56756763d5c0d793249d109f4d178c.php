<?php $__env->startSection('content'); ?>

<style>
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    --hover-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.main-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-title {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.page-subtitle {
    color: #6c757d;
    font-size: 1.1rem;
}

.custom-card {
    border: none;
    border-radius: 20px;
    box-shadow: var(--card-shadow);
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
}

.custom-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--hover-shadow);
}

.card-header-custom {
    background: var(--primary-gradient);
    border-radius: 20px 20px 0 0 !important;
    padding: 1.5rem;
    border: none;
}

.card-header-custom h5 {
    color: white;
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-control,
.form-select {
    border-radius: 12px;
    border: 2px solid #e9ecef;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.form-control:focus,
.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.75rem;
}

.product-table {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.product-img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 10px;
}

.table thead th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: none;
    font-weight: 600;
    color: #495057;
    padding: 1rem;
}

.table tbody td {
    padding: 1rem;
    vertical-align: middle;
    border-color: #f1f3f4;
}

.price-text {
    font-weight: 600;
    color: #28a745;
}

.total-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 1.5rem;
    margin-top: 1rem;
}

.total-amount {
    font-size: 1.5rem;
    font-weight: 700;
    color: #495057;
}

.btn-payment {
    background: var(--success-gradient);
    border: none;
    border-radius: 15px;
    padding: 1rem 2rem;
    font-weight: 600;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-payment:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(79, 172, 254, 0.3);
}

.btn-payment::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
    transform: translate(-50%, -50%);
}

.btn-payment:hover::before {
    width: 300px;
    height: 300px;
}

.secure-badge {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.progress-steps {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.step {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 25px;
    margin: 0 0.5rem;
    font-size: 0.9rem;
    font-weight: 600;
}

.step.active {
    background: var(--primary-gradient);
    color: white;
}

.floating-elements {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    z-index: -1;
}

.floating-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(102, 126, 234, 0.1);
    animation: float 6s ease-in-out infinite;
}

.floating-circle:nth-child(1) {
    width: 80px;
    height: 80px;
    top: 10%;
    left: 10%;
    animation-delay: -1s;
}

.floating-circle:nth-child(2) {
    width: 120px;
    height: 120px;
    top: 20%;
    right: 10%;
    animation-delay: -3s;
}

.floating-circle:nth-child(3) {
    width: 100px;
    height: 100px;
    bottom: 10%;
    left: 20%;
    animation-delay: -5s;
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0px) rotate(0deg);
    }

    33% {
        transform: translateY(-20px) rotate(120deg);
    }

    66% {
        transform: translateY(10px) rotate(240deg);
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }

    .main-container {
        padding: 1rem;
    }

    .product-img {
        width: 50px;
        height: 50px;
    }
}
</style>







<div class="main-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="bi bi-credit-card-2-front"></i>
            Thanh Toán
        </h1>
        <p class="page-subtitle">Hoàn tất đơn hàng của bạn một cách an toàn và nhanh chóng</p>
    </div>

    <!-- Progress Steps -->
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

    <form action="<?php echo e(route('order.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row g-4">
            <!-- Customer Information -->
            <div class="col-lg-7">
                <div class="custom-card">
                    <div class="card-header-custom">
                        <h5>
                            <i class="bi bi-person-fill"></i>
                            Thông Tin Khách Hàng
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">
                                        <i class="bi bi-person"></i> Họ
                                    </label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                    placeholder="Nhập họ" value="<?php echo e(old('firstName')); ?>" required>
                                <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="Nhập tên" value="<?php echo e(old('lastName')); ?>" required>
                                <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">
                                        <i class="bi bi-envelope"></i> Email
                                    </label>
                                     <input type="email" class="form-control" id="email" name="email"
                                    placeholder="your.email@example.com" value="<?php echo e(old('email', $user->email)); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">
                                        <i class="bi bi-telephone"></i> Số Điện Thoại
                                    </label>
                                   <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="0123 456 789" value="<?php echo e(old('phone')); ?>" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">
                                        <i class="bi bi-geo-alt"></i> Tỉnh/Thành phố
                                    </label>
                                     <select class="form-select" id="city" name="city" required>
                                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city['code']); ?>" 
                                            <?php echo e(old('city') == $city['code'] ? 'selected' : ''); ?>>
                                            <?php echo e($city['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">
                                        <i class="bi bi-house"></i> Địa Chỉ Chi Tiết
                                    </label>
                                     <textarea class="form-control" id="address" name="address" rows="3"
                                    placeholder="Số nhà, tên đường, phường/xã..."><?php echo e(old('address')); ?></textarea>
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="custom-card">
                    <div class="card-header-custom">
                        <h5>
                            <i class="bi bi-bag-check"></i>
                            Đơn Hàng Của Bạn
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="product-table">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">SL</th>
                                        <th class="text-end">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="<?php echo e(asset('storage/' . $cart->product->image)); ?>"
                                                    alt="<?php echo e($cart->product->name); ?>" class="product-img">
                                                <div>
                                                    <div class="fw-semibold"><?php echo e($cart->product->name); ?></div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark"><?php echo e($cart->soluong); ?></span>
                                        </td>
                                        <td class="text-end price-text">
                                            <?php echo e(number_format($cart->product->price * $cart->soluong, 0, ',', '.')); ?>₫
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="total-section">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tạm tính:</span>
                                <span><?php echo e(number_format($totalPrice, 0, ',', '.')); ?>₫</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Phí vận chuyển:</span>
                                <span class="text-success">Miễn phí</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Tổng cộng:</span>
                                <span
                                    class="total-amount text-primary"><?php echo e(number_format($totalPrice, 0, ',', '.')); ?>₫</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-payment w-100 mt-3">
                            <i class="bi bi-shield-check"></i>
                            Thanh Toán Khi nhận hàng
                        </button>


                    </div>
                </div>
            </div>
        </div>
    </form>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[action="<?php echo e(route('order.store')); ?>"]');
    const paymentBtn = document.querySelector('.btn-payment');

    if (form && paymentBtn) {
        form.addEventListener('submit', function (e) {
            paymentBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Đơn hàng của bạn đang được xử lý...';
            paymentBtn.disabled = true; // Ngăn việc bấm nhiều lần
        });
    }
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShopCongNghe\example-app\resources\views/user/payment.blade.php ENDPATH**/ ?>