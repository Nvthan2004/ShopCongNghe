<?php $__env->startSection('content'); ?>

<div class="container py-4">


<!-- Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      
      <div class="carousel-inner ">
        <div id="carousel-item" class="carousel-item active">
          <img src="<?php echo e(asset('storage/img/samsunggalaxyslidings24.png')); ?>" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-none d-md-block">
            <h2><i class="fas fa-mobile-alt me-2"></i>Chào mừng đến với Shop Công Nghệ</h2>
            <p>Nơi mua sắm thiết bị hiện đại và uy tín</p>
          </div>
        </div>
        <div id="carousel-item" class="carousel-item">
          <img src="<?php echo e(asset('storage/img/Macair13.png')); ?>" class="d-block w-100" alt="Slide 2">
          <div class="carousel-caption d-none d-md-block">
            <h2><i class="fas fa-laptop me-2"></i>Sản phẩm mới nhất</h2>
            <p>Luôn cập nhật xu hướng công nghệ</p>
          </div>
        </div>
        <div id="carousel-item" class="carousel-item">
          <img src="<?php echo e(asset('storage/img/xiaomi_14.png')); ?>" class="d-block w-100" alt="Slide 3">
          <div class="carousel-caption d-none d-md-block">
            <h2><i class="fas fa-laptop me-2"></i>Sản phẩm mới nhất</h2>
            <p>Luôn cập nhật xu hướng công nghệ</p>
          </div>
        </div>
      </div>
      
      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>
<!-- Sản phẩm -->
<div class="container my-5">
  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($category->products->count() > 0): ?>
        <div class="container my-5">
            <h3 class="mb-4 fw-bold text-center text-uppercase"><?php echo e($category->name); ?></h3>
            <div id="carouselCategory<?php echo e($category->id); ?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $__currentLoopData = $category->products->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                            <div class="row g-4">
                                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <div class="card product-card shadow-sm">
                                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="card-img-top fixed-size-img" alt="<?php echo e($product->name); ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                                <p class="card-text"><?php echo e($product->description); ?></p>
                                                <a href="<?php echo e(route('product.show', $product->id)); ?>" class="btn btn-primary w-100">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategory<?php echo e($category->id); ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Trước</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselCategory<?php echo e($category->id); ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Tiếp</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>






<?php echo $__env->make('user.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/user/index.blade.php ENDPATH**/ ?>