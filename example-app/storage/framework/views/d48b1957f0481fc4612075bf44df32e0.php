

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h1 class="mb-4">Edit Category</h1>
    <form action="<?php echo e(route('categorys.update_cate', $category->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?php echo e($category->name); ?>">
        </div>

        <!-- Slug (Readonly) -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="<?php echo e($category->slug); ?>" readonly>
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
        <button type="submit" class="btn btn-primary">Update Brand</button>
    </form>
</div>

<script>
    // Convert string to slug
    function stringToSlug(str) {
        return str
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9-]+/g, '-') // Replace spaces and non-alphanumeric characters with '-'
            .replace(/-+/g, '-')          // Replace multiple '-' with a single '-'
            .replace(/^-|-$/g, '');       // Remove leading or trailing '-'
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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/admin/crud_category/update_category.blade.php ENDPATH**/ ?>