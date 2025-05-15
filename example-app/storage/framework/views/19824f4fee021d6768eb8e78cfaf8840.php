<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <?php if(!empty($search)): ?>
    <h4>Kết quả tìm kiếm cho: <strong><?php echo e($search); ?></strong></h4>
    <?php endif; ?>
    <div class="row g-4 mt-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card h-100 shadow-sm border-light rounded">
                <img src="<?php echo e(asset('storage/' . $item->image)); ?>"
                    style="object-fit: contain; width: 100%; height: 300px;" alt="<?php echo e($item->name); ?>">

                <div class="card-body">
                    <h5 class="card-title"><?php echo e($item->name); ?></h5>
                    <p class="card-text text-muted"><?php echo e(Str::limit($item->description, 100)); ?></p>
                    <p class="text-danger fw-bold"><?php echo e(number_format($item->price, 0, ',', '.')); ?>₫</p>
                    <a href="<?php echo e(route('product.show', $item->id)); ?>" class="btn btn-outline-primary mt-2">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Phân trang -->
    <div class="mt-4 d-flex justify-content-center">
        <?php echo $products->withQueryString()->links('pagination::bootstrap-5'); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/user/single.blade.php ENDPATH**/ ?>