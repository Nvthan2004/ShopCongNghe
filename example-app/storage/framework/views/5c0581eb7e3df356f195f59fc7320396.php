<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin cá nhân</h5>
                </div>

                <div class="card-body">

                    <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('user.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <!-- Thông tin bên trái -->
                            <div class="col-md-8">
                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control"
                                        value="<?php echo e(old('username', auth()->user()->username)); ?>"readonly>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>"
                                            readonly>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#changeEmailModal">
                                            Thay đổi Email
                                        </button>
                                    </div>
                                </div>


                                <!-- Mật khẩu -->
                                <!-- Thay mật khẩu -->
                                <div class="mb-3">
                                    <label class="form-label d-block">Mật khẩu</label>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#changePasswordModal">
                                        Thay đổi mật khẩu
                                    </button>
                                </div>

                            </div>

                            <!-- Avatar bên phải -->
                            <div
                                class="col-md-4 text-center d-flex flex-column align-items-center justify-content-start">
                                <?php if(auth()->user()->img): ?>
                                <img src="<?php echo e(asset('storage/' . auth()->user()->img)); ?>"
                                    class="rounded-circle img-thumbnail mb-3"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                                <?php else: ?>
                                <img src="https://via.placeholder.com/150" class="rounded-circle img-thumbnail mb-3"
                                    style="width: 150px; height: 150px;">
                                <?php endif; ?>


                                <div class="mb-3 w-100">
                                    <label for="avatar" class="form-label">Thay ảnh đại diện</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Nút lưu -->
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal đổi mật khẩu -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(route('user.changePassword')); ?>" method="POST" class="modal-content">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Mật khẩu mới</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal thay đổi Email -->
<!-- Modal thay đổi Email -->
<div class="modal fade" id="changeEmailModal" tabindex="-1" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(route('user.changeEmail')); ?>" method="POST" class="modal-content">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="changeEmailModalLabel">Thay đổi Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="new_email" class="form-label">Email mới</label>
                    <input type="email" name="new_email" id="new_email" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="submit" class="btn btn-primary">Cập nhật Email</button>
            </div>
        </form>
    </div>
</div>


<script>
document.getElementById('edit-email-btn').addEventListener('click', function() {
    const emailInput = document.getElementById('email');
    emailInput.removeAttribute('readonly');
    emailInput.focus();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/user/setting.blade.php ENDPATH**/ ?>