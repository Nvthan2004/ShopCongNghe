<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h1 class="text-center mb-4">Cập Nhật Sản Phẩm</h1>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data"
        id="updateProductForm">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($product->name); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo e($product->price); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="4"
                required><?php echo e($product->description); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo e($product->quantity); ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh Mục</label>
            <select class="form-select" id="category" name="category" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->name); ?>" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Thương Hiệu</label>
            <select class="form-select" id="brand" name="brand" required>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($brand->name); ?>" <?php echo e($product->brand_id == $brand->id ? 'selected' : ''); ?>>
                    <?php echo e($brand->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="image" name="image">
            <?php if($product->image): ?>
            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="100" class="mt-3">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-success">Cập Nhật</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Khi submit form Cập Nhật
    document.getElementById('updateProductForm').addEventListener('submit', function() {
        // Lưu thời gian cập nhật vào localStorage
        localStorage.setItem('productUpdated', Date.now());
        // Có thể thêm alert hoặc console
        console.log('Đã gửi cập nhật sản phẩm và ghi localStorage');
    });

    // Các tab khác lắng nghe sự kiện storage
    window.addEventListener('storage', function(event) {
        if (event.key === 'productUpdated') {
            // Thông báo cho người dùng biết có cập nhật mới từ tab khác
            alert(
                '⚠️ Có thay đổi dữ liệu sản phẩm từ tab khác! Vui lòng tải lại trang để xem cập nhật mới.');
            // Hoặc tự động reload trang nếu bạn muốn:
            // location.reload();
        }
    });
}); // Nút test cho việc thử nghiệm
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShopCongNghe\example-app\resources\views/admin/crud_product/update_product.blade.php ENDPATH**/ ?>