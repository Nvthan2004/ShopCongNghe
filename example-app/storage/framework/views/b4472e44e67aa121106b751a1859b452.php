<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tất Cả Sản Phẩm</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-card img {
      height: 200px;
      object-fit: cover;
    }
    .filter-section {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
    }
    .product-title {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .navbar-brand span {
      color: #0d6efd;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Shop<span>CôngNghệ</span></a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item"><a class="nav-link " href="<?php echo e(route('user.home')); ?>">Trang Chủ</a></li>
        <li class="nav-item"><a class="nav-link " href="<?php echo e(route('user.product_view')); ?>">Sản Phẩm</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Liên Hệ</a></li>
        <li class="nav-item position-relative ms-3">
          <a class="nav-link" href="cart.html">
            <i class="bi bi-cart3 fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">
              0
            </span>
          </a>
        </li>
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
  </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/user/dashboard_user.blade.php ENDPATH**/ ?>