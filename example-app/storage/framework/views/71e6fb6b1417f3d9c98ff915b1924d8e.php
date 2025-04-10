

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Category List</h1>
    <a href="<?php echo e(route('admin.add_category')); ?>" class="btn btn-primary mb-3">Add New Category</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="display: none;">#</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="display: none;"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->slug); ?></td>
                    <td>
                    <?php if($category->image): ?>
                    <img src="<?php echo e(asset('storage/' . $category->image)); ?>" alt="image" width="50">
                    <?php else: ?>
                    N/A
                    <?php endif; ?>
                </td>
                    <td>
                        <a href="<?php echo e(route('categorys.edit_cate', $category->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('categorys.destroy_category', $category->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">No categories found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/admin/crud_category/list_category.blade.php ENDPATH**/ ?>