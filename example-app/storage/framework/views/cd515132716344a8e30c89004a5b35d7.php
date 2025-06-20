<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Tất Cả Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
    .nav-item .dropdown-toggle img {
        border: 2px solid #ffffff;
        object-fit: cover;
    }

    .fixed-size-img {
        width: 100%;
        /* Chiều rộng luôn bằng với thẻ cha */
        aspect-ratio: 18 / 18;
        /* Chiều cao cố định */
        object-fit: contain;
        /* Đảm bảo hiển thị toàn bộ hình ảnh */
    }

    body {
        background-color: #f0f4f8;
    }

    .product-card {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(13, 110, 253, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .product-card img {
        height: 200px;
        object-fit: contain;
        /* Hiển thị toàn bộ hình ảnh mà không bị cắt */
        object-position: center;
        /* Định vị hình ảnh ở giữa */
    }

    .filter-section {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        border-left: 4px solid #0d6efd;
    }

    .product-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #2c3e50;
    }

    .navbar-brand span {
        color: #4dabf7;
    }

    /* Tùy chỉnh carousel */
    #heroCarousel {
        margin-bottom: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    #carousel-item {
        height: 550px;
        position: relative;
    }

    .carousel-item img {
        height: 100%;
        object-fit: cover;
    }

    .carousel-caption {
        background: linear-gradient(135deg, rgba(13, 110, 253, 0.85), rgba(9, 84, 194, 0.85));
        border-radius: 0.5rem;
        padding: 1.5rem;
        bottom: 2rem;
        max-width: 80%;
        margin: 0 auto;
        left: 10%;
        right: 10%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .carousel-caption h2 {
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        color: #ffffff;
    }

    .carousel-caption p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Tùy chỉnh nút điều hướng */
    .carousel-control-prev,
    .carousel-control-next {
        width: 3rem;
        height: 3rem;
        background-color: rgba(13, 110, 253, 0.7);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0.8;
    }

    .carousel-control-prev {
        left: 1rem;
    }

    .carousel-control-next {
        right: 1rem;
    }

    /* Indicators */
    .carousel-indicators {
        bottom: 1rem;
    }

    .carousel-indicators button {
        width: 0.75rem;
        height: 0.75rem;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.7);
        margin: 0 0.3rem;
    }

    .carousel-indicators button.active {
        background-color: #ffffff;
        transform: scale(1.2);
    }

    /* Đáp ứng điện thoại di động */
    @media (max-width: 768px) {
        .carousel-item {
            height: 350px;
        }

        .carousel-caption {
            display: block !important;
            padding: 1rem;
        }

        .carousel-caption h2 {
            font-size: 1.5rem;
        }

        .carousel-caption p {
            font-size: 1rem;
        }
    }

    html,
    body {
        height: 100%;
    }

    #app {
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }

    footer {
        margin-top: auto;
        background: linear-gradient(to right, #212529, #343a40);
    }

    .navbar {
        background: linear-gradient(to right, #212529, #343a40) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }

    .contact-section {
        background-color: #f8f9fa;
        border-radius: 20px;
        padding: 40px 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .section-title {
        position: relative;
        margin-bottom: 50px;
        color: #212529;
    }

    .section-title:after {
        content: '';
        position: absolute;
        width: 70px;
        height: 4px;
        background: linear-gradient(to right, #0d6efd, #4dabf7);
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .contact-card {
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        height: 100%;
        transition: transform 0.3s;
    }

    .contact-card:hover {
        transform: translateY(-5px);
    }

    .info-box {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        margin-bottom: 20px;
        border-left: 4px solid #0d6efd;
        transition: all 0.3s;
    }

    .info-box:hover {
        background-color: #e9ecef;
        transform: translateX(5px);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.5rem;
        margin-right: 15px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
        transition: all 0.3s;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        border-color: #0d6efd;
        background-color: #fff;
    }

    .btn-contact {
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: linear-gradient(to right, #0d6efd, #4dabf7);
        border: none;
        transition: all 0.3s;
    }

    .btn-contact:hover {
        background: linear-gradient(to right, #0b5ed7, #3c99e6);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }

    .map-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        height: 100%;
    }

    .map-container iframe {
        height: 100%;
        min-height: 450px;
    }

    @media (max-width: 768px) {
        .info-section {
            margin-top: 30px;
        }

        .map-container iframe {
            min-height: 300px;
        }
    }

    .cart-header {
        background: linear-gradient(135deg, #13547a 0%, #80d0c7 100%);
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 20px;
        margin-bottom: 0;
    }

    .cart-container {
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        background-color: white;
        overflow: hidden;
    }

    .product-card {
        border: none;
        border-bottom: 1px solid #eee;
        border-radius: 0;
        transition: all 0.3s ease;
    }

    .product-card:last-child {
        border-bottom: none;
    }

    .product-card:hover {
        background-color: #f8f9fa;
    }

    .product-img {
        border-radius: 10px;
        border: 1px solid #eee;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.05);
    }

    .quantity-input {
        max-width: 80px;
        border-radius: 20px;
        text-align: center;
        border: 1px solid #ced4da;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        padding: 0;
        border-radius: 50%;
        text-align: center;
        font-size: 12px;
        line-height: 1.428571429;
    }

    .summary-card {
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .checkout-btn {
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: all 0.3s;
    }

    .checkout-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }

    .continue-shopping {
        color: #6c757d;
        text-decoration: none;
        transition: all 0.3s;
    }

    .continue-shopping:hover {
        color: #343a40;
    }

    .badge-product {
        background-color: #13547a;
        color: white;
        font-size: 0.8rem;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .divider {
        height: 1px;
        background-color: #e9ecef;
        margin: 15px 0;
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('user.home')); ?>">Shop<span>CôngNghệ</span></a>
            <button class="navbar-toggler" data-b   s-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex ms-3" action="<?php echo e(route('user.product.search')); ?>" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Tìm sản phẩm..."
                    value="<?php echo e(request('search')); ?>">
                <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link " href="<?php echo e(route('user.home')); ?>">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link " href="<?php echo e(route('user.product_view')); ?>">Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('oder.list')); ?>">Đơn hàng</a></li>
                    <!-- cart -->
                    <li class="nav-item position-relative ms-3">
                        <a class="nav-link" href="<?php echo e(route('user.carts')); ?>">
                            <i class="bi bi-cart3 fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                id="cart-count">
                                0
                            </span>
                        </a>
                    </li>
                    <?php if(isset($user)): ?>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo e(asset('storage/' . $user->img)); ?>" alt="User Avatar"
                                class="rounded-circle me-2" width="40" height="40">
                            <span class="fw-bold" id="user-name"><?php echo e($user->username); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="<?php echo e(route('user.edit')); ?>" id="logout-btn"><i class="bi bi-gear-fill"></i>
                                    cài đặt</a></li>
                            <?php if($user->role === 'admin'): ?>
                            <li><a class="dropdown-item" href="<?php echo e(route('admin.home')); ?>" id="admin-btn"><i
                                        class="bi bi-shield-lock-fill"></i>
                                    Admin</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?php echo e(route('signout')); ?>" id="logout-btn"><i
                                        class="bi bi-box-arrow-right"></i>
                                    Đăng Xuất</a></li>

                        </ul>
                    </li>
                    <?php else: ?>
                    <li class="nav-item"><a class="nav-link " href="<?php echo e(route('login')); ?>">Đăng Nhập</a></li>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>




    <!-- Footer -->
    <footer class="footer text-center bg-dark text-white p-4">
        <div class="container">
            <p class="mb-1">© 2025 Shop Công Nghệ</p>
            <p>Email: support@shopcongnghe.vn | SĐT: 0123 456 789</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
    // Giả lập: bạn có thể thay bằng dữ liệu thực tế
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    document.getElementById("cart-count").innerText = cartItems.length;




    document.addEventListener('DOMContentLoaded', function() {

        
        // Lấy số lượng hiện tại trong giỏ hàng khi trang được tải
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('cart-count').textContent = data.count;
                }
            })
            .catch(error => console.error('Error fetching cart count:', error));

        // Bắt sự kiện submit cho tất cả các form thêm vào giỏ hàng
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Ngăn chặn form submit thông thường

                const formData = new FormData(this);

                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Hiển thị thông báo thành công
                            showToast('Thành công', 'Sản phẩm đã được thêm vào giỏ hàng.');

                            // Cập nhật số lượng trong badge
                            updateCartBadge(1); // Tăng thêm 1
                        } else {
                            showToast('Lỗi', data.message ||
                                'Có lỗi xảy ra khi thêm sản phẩm.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Lỗi', 'Không thể thêm sản phẩm. Vui lòng thử lại sau.');
                    });
            });
        });
    });

    // Hàm cập nhật số lượng trong badge giỏ hàng
    function updateCartBadge(change = 0) {
        const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            // Lấy giá trị hiện tại và chuyển đổi thành số
            let currentCount = parseInt(cartCountElement.textContent || '0');

            // Cập nhật số lượng
            currentCount += change;

            // Cập nhật nội dung hiển thị
            cartCountElement.textContent = currentCount;

            // Thêm hiệu ứng nhấp nháy
            cartCountElement.classList.add('badge-highlight');
            setTimeout(() => {
                cartCountElement.classList.remove('badge-highlight');
            }, 700);
        }
    }

    // Hàm hiển thị thông báo toast
    function showToast(title, message) {
        // Bạn có thể sử dụng Bootstrap Toast hoặc thư viện khác
        // Đây là ví dụ đơn giản:
        const toastContainer = document.getElementById('toast-container') || createToastContainer();

        const toast = document.createElement('div');
        toast.className = 'toast show';
        toast.innerHTML = `
        <div class="toast-header">
            <strong class="me-auto">${title}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            ${message}
        </div>
    `;

        toastContainer.appendChild(toast);

        // Tự động ẩn toast sau 3 giây
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    // Tạo container cho toast nếu chưa có
    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'toast-container position-fixed bottom-0 end-0 p-3';
        document.body.appendChild(container);
        return container;
    }

    // Thêm CSS cho hiệu ứng nhấp nháy
    const style = document.createElement('style');
    style.textContent = `
@keyframes badgeHighlight {
    0% { transform: scale(1); }
    50% { transform: scale(1.3); }
    100% { transform: scale(1); }
}

.badge-highlight {
    animation: badgeHighlight 0.7s ease;
}
`;
    document.head.appendChild(style);
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/user/dashboard_user.blade.php ENDPATH**/ ?>