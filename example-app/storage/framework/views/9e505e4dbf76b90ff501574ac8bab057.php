<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row g-5">
        <div class="col-md-5">
            <img style=" object-position: center; object-fit: contain; height: 500px;" src="<?php echo e(asset('storage/' . $product->image)); ?>" class="img-fluid product-img" alt="<?php echo e($product->name); ?>">
        </div>
        <div class="col-md-7">
            <h3><?php echo e($product->name); ?></h3>
            <p class="text-muted">Mã SP: <?php echo e($product->sku); ?></p>
            <h4 class="text-danger mb-3"><?php echo e(number_format($product->price, 0, ',', '.')); ?>₫</h4>
            <p><?php echo e($product->description); ?></p>
            <ul>
                <li>Chip xử lý: <?php echo e($product->chip); ?></li>
                <li>RAM: <?php echo e($product->ram); ?>GB</li>
                <li>Bộ nhớ: <?php echo e($product->storage); ?>GB</li>
                <li>Pin: <?php echo e($product->battery); ?>mAh</li>
            </ul>
            <button class="btn btn-primary mt-3">Mua Ngay</button>
        </div>
    </div>

    <ul class="nav nav-tabs mt-5" id="productTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button">Mô Tả</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button">Đánh Giá</button>
        </li>
    </ul>
    <div class="tab-content p-3 border border-top-0" id="productTabContent">
        <div class="tab-pane fade show active" id="desc" role="tabpanel">
            <p><?php echo e($product->description); ?></p>
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel">
            <!-- Hiển thị đánh giá -->
            <p>Hiện tại chưa có đánh giá.</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <h4 class="mb-4 fw-bold">Sản Phẩm Liên Quan</h4>
    <div class="row g-4">
        <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card related-product shadow-sm">
                <img src="<?php echo e(asset('storage/' . $relatedProduct->image)); ?>" class="card-img-top w-100" alt="<?php echo e($relatedProduct->name); ?>" style=" object-position: center; object-fit: contain; height: 200px;">
                <div class="card-body">
                    <h6 class="card-title"><?php echo e($relatedProduct->name); ?></h6>
                    <p class="text-danger fw-bold"><?php echo e(number_format($relatedProduct->price, 0, ',', '.')); ?>₫</p>
                    <a href="<?php echo e(route('product.show', $relatedProduct->id)); ?>" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/user/detail_product.blade.php ENDPATH**/ ?>