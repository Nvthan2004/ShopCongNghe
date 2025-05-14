<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">List of Brands</h1>

    <!-- Success Message -->
    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <!-- Add Brand Button -->
    <div class="mb-3">
        <a href="<?php echo e(route('admin.add_brand')); ?>" class="btn btn-primary">Add New Brand</a>
    </div>

    <!-- Brands Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th style="display: none;">#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="display: none;"><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($brand->name); ?></td>
                <td><?php echo e($brand->slug); ?></td>
                <td>
                    <?php if($brand->logo): ?>
                    <img src="<?php echo e(asset('storage/' . $brand->logo)); ?>" alt="Logo" width="50">
                    <?php else: ?>
                    N/A
                    <?php endif; ?>
                </td>
                <td>
                <a href="<?php echo e(route('brands.edit', $brand->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('brands.destroy', $brand->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" class="text-center">No brands found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/admin/crud_brand/list_brand.blade.php ENDPATH**/ ?>