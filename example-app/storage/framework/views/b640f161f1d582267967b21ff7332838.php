

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h1 class="text-center mb-4">Danh Sách Người Dùng</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <!-- Hiển thị ảnh đại diện với hình tròn và kích thước vừa phải -->
                        <img src="<?php echo e(asset('storage/' . $user->img)); ?>" alt="Avatar" class="rounded-circle" width="50" height="50">
                    </td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <!-- Vai trò người dùng sẽ được làm nổi bật bằng badge -->
                        <span class="badge bg-primary"><?php echo e($user->role); ?></span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($users->links('pagination::bootstrap-4')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/admin/crud_user/list_user.blade.php ENDPATH**/ ?>