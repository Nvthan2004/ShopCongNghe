<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Edit Category</h1>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <script>
            localStorage.setItem('category_updated', Date.now());
        </script>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('categorys.update_cate', $category->id)); ?>" method="POST" enctype="multipart/form-data" id="category-form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Hidden updated_at field -->
        <input type="hidden" name="updated_at" id="updated_at" value="<?php echo e($category->updated_at); ?>">

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?php echo e(old('name', $category->name)); ?>">
        </div>

        <!-- Slug (Readonly) -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" readonly value="<?php echo e(old('slug', $category->slug)); ?>">
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label for="image" class="form-label">Logo</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <!-- Preview -->
        <div class="mb-3">
            <label class="form-label">Preview</label>
            <div id="preview-container">
                <img id="image-preview" 
                     src="<?php echo e($category->image ? asset('storage/' . $category->image) : '#'); ?>" 
                     alt="Image Preview" 
                     style="display: <?php echo e($category->image ? 'block' : 'none'); ?>; max-height: 200px; margin-top: 10px;">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

<script>
    // Lưu thời điểm form được tải
    const formLoadedAt = Date.now();

    // Convert string to slug
    function stringToSlug(str) {
        return str
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
    }

    // Auto-generate slug when name is typed
    document.getElementById('name').addEventListener('input', function () {
        const slugField = document.getElementById('slug');
        slugField.value = stringToSlug(this.value);
    });

    // Preview image functionality
    document.getElementById('image').addEventListener('change', function (event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });

    // Lắng nghe localStorage thay đổi (category_updated)
    window.addEventListener('storage', function(event) {
        if (event.key === 'category_updated') {
            alert('Category đã được cập nhật ở tab khác. Trang sẽ được tải lại để đồng bộ.');
            location.reload();
        }
    });

    // Khi tab focus lại, kiểm tra có cập nhật mới không
    window.addEventListener('focus', function() {
        const updatedTimestamp = localStorage.getItem('category_updated');
        if (updatedTimestamp) {
            alert('Category đã được cập nhật ở tab khác. Trang sẽ được tải lại để đồng bộ.');
            location.reload();
        }
    });

    // Trước khi submit, kiểm tra cập nhật đồng bộ
    document.getElementById('category-form').addEventListener('submit', function(e) {
        const updatedTimestamp = localStorage.getItem('category_updated');
        if (updatedTimestamp) {
            e.preventDefault();
            alert('Dữ liệu đã được cập nhật ở tab khác, vui lòng tải lại trang trước khi lưu.');
            location.reload();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/admin/crud_category/update_category.blade.php ENDPATH**/ ?>