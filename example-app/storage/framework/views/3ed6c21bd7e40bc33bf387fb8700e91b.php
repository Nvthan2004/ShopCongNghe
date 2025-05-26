<?php $__env->startSection('content'); ?>
 <!-- Chart Area -->
 <div class="chart-area">
          <h4 class="mb-3">Biểu đồ</h4>
          <!-- Biểu đồ thật có thể dùng chart.js -->
          <div style="height: 200px; background-color: #e9ecef; border-radius: 8px;"></div>
        </div>

        <!-- Stats Boxes -->
        <div class="row g-3">
          <div class="col-md-4">
            <div class="stat-box">
              <h5>Tổng doanh thu</h5>
              <p>$12,345</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="stat-box">
              <h5>Người dùng mới</h5>
              <p>234</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="stat-box">
              <h5>Đơn hàng</h5>
              <p>56</p>
            </div>
          </div>
        </div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShopCongNghe\example-app\resources\views/admin/crud/home_admin.blade.php ENDPATH**/ ?>