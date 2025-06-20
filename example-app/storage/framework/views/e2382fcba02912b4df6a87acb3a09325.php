<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        .footer {
            position: relative;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('user.home')); ?>">Trang Chủ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">Đăng Nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('user.createUser')); ?>">Đăng Ký</a></li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('signout')); ?>">Đăng Xuất</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5 footer">
        <p class="mb-0">Lập Trình Web @01/2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\ShopCongNghe\example-app\resources\views/dashboard.blade.php ENDPATH**/ ?>