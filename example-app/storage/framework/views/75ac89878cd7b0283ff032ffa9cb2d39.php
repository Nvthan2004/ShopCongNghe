<?php $__env->startSection('content'); ?>

<!-- Banner -->
<div class="bg-light p-5 text-center">
    <h2 class="fw-bold">Tất Cả Sản Phẩm</h2>
    <p class="text-muted">Khám phá các sản phẩm công nghệ mới nhất tại Shop Công Nghệ</p>
</div>

<!-- Bộ lọc & sản phẩm -->
<div class="container my-5">
    <div class="row">
        <!-- Bộ lọc -->
        <div class="col-md-3">
            <!-- Hiển thị thông tin lọc -->
            <?php if(request('category') || request('brand') || request('price_range')): ?>
            <div class="mb-4">
                <p><strong>Kết quả tìm kiếm:</strong></p>
                <?php if(request('category')): ?>
                <p><strong>Loại sản phẩm:</strong> <?php echo e($categories->firstWhere('id', request('category'))->name); ?></p>
                <?php endif; ?>
                <?php if(request('brand')): ?>
                <p><strong>Thương hiệu:</strong> <?php echo e($brands->firstWhere('id', request('brand'))->name); ?></p>
                <?php endif; ?>
                <?php if(request('price_range')): ?>
                <p><strong>Khoảng giá:</strong>
                    <?php if(request('price_range') == '0-5000000'): ?> Dưới 5 triệu
                    <?php elseif(request('price_range') == '5000000-10000000'): ?> 5 - 10 triệu
                    <?php elseif(request('price_range') == '10000000-20000000'): ?> 10 - 20 triệu
                    <?php else: ?> Trên 20 triệu
                    <?php endif; ?>
                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="filter-section">
                <form method="GET" action="<?php echo e(route('user.product_view')); ?>">
                    <!-- Loại sản phẩm -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Loại sản phẩm</label>
                        <select class="form-select" name="category">
                            <option value="" selected>Tất cả</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"
                                <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Thương hiệu -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thương hiệu</label>
                        <select class="form-select" name="brand">
                            <option value="" selected>Tất cả</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>" <?php echo e(request('brand') == $brand->id ? 'selected' : ''); ?>>
                                <?php echo e($brand->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Khoảng giá</label>
                        <select class="form-select" name="price_range">
                            <option value="" selected>Tất cả</option>
                            <option value="0-5000000" <?php echo e(request('price_range') == '0-5000000' ? 'selected' : ''); ?>>Dưới
                                5 triệu</option>
                            <option value="5000000-10000000"
                                <?php echo e(request('price_range') == '5000000-10000000' ? 'selected' : ''); ?>>5 - 10 triệu
                            </option>
                            <option value="10000000-20000000"
                                <?php echo e(request('price_range') == '10000000-20000000' ? 'selected' : ''); ?>>10 - 20 triệu
                            </option>
                            <option value="20000000-100000000"
                                <?php echo e(request('price_range') == '20000000-100000000' ? 'selected' : ''); ?>>Trên 20 triệu
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Lọc Sản Phẩm</button>
                </form>
            </div>

        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-md-9">



            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="card-img-top"
                            alt="<?php echo e($product->name); ?>" />
                        <div class="card-body">
                            <h6 class="product-title"><?php echo e($product->name); ?></h6>
                            <p class="text-danger fw-bold"><?php echo e(number_format($product->price, 0, ',', '.')); ?> ₫</p>
                            <a href="<?php echo e(route('product.show', $product->id)); ?>" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center">Không có sản phẩm nào!</p>
                <?php endif; ?>
            </div>


            <!-- Phân trang -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php echo e($products->appends(request()->query())->links('pagination::bootstrap-4')); ?>

                </ul>
            </nav>


        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/user/view_products.blade.php ENDPATH**/ ?>