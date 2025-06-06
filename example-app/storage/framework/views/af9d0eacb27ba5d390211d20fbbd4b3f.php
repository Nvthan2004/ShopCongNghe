<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h1 class="text-center mb-4">Danh Sách Sản Phẩm</h1>

    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Quản lý sản phẩm</h4>
        <a href="<?php echo e(route('admin.add_product')); ?>" class="btn btn-primary">Thêm Sản Phẩm</a>
    </div>

    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th style="display: none;">ID</th>
                <th>Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá (VND)</th>
                <th>Mô Tả</th>
                <th>Số Lượng</th>
                <th>Danh Mục</th>
                <th>Thương Hiệu</th>
                <th>Ngày</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="display: none;"><?php echo e($product->id); ?></td>
                <td><img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="70"></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e(number_format($product->price)); ?> VND</td>
                <td><?php echo e($product->description); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->category->name ?? 'N/A'); ?></td>
                <td><?php echo e($product->brand->name ?? 'N/A'); ?></td>
                <td><?php echo e($product->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="d-inline-block"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="10" class="text-center">Không có sản phẩm nào</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($products->links('pagination::bootstrap-4')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Tab khác sẽ nhận được tín hiệu và hiển thị thông báo
    window.addEventListener('storage', function(event) {
        if (event.key === 'productUpdated') {
            // Ghi vào sessionStorage để giữ được thông báo sau reload
            sessionStorage.setItem('showUpdateNotice', '1');
            location.reload();
        }
    });

    // Nếu tab này vừa xóa thành công, gửi tín hiệu cho các tab khác
    <?php if(session('success')): ?>
        window.addEventListener('DOMContentLoaded', function () {
            localStorage.setItem('productUpdated', Date.now());
        });
    <?php endif; ?>

    // Nếu tab vừa reload và có flag showUpdateNotice thì hiển thị alert
    window.addEventListener('DOMContentLoaded', function () {
        if (sessionStorage.getItem('showUpdateNotice')) {
            alert('Sản phẩm đã bị xóa ở tab khác. Trang đã được cập nhật.');
            sessionStorage.removeItem('showUpdateNotice');
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/admin/crud_product/list_product.blade.php ENDPATH**/ ?>