<?php $__env->startSection('content'); ?>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;

}

.header {
    margin-top: 40px;
    text-align: center;
    margin-bottom: 30px;
    color: blue;
}

.header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.header p {
    font-size: 1.1rem;
    opacity: 0.9;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-card i {
    font-size: 2rem;
    margin-bottom: 10px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-card h3 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 5px;
}

.stat-card p {
    color: #666;
    font-size: 0.9rem;
}

.orders-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.orders-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.orders-title {
    font-size: 1.5rem;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
}

.filter-buttons {
    display: flex;
    gap: 10px;
}

.filter-btn {
    padding: 8px 16px;
    border: 2px solid #667eea;
    background: transparent;
    color: #667eea;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.filter-btn:hover,
.filter-btn.active {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    transform: translateY(-2px);
}

.order-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    border-left: 5px solid #667eea;
    transition: all 0.3s ease;
}

.order-card:hover {
    transform: translateX(5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.order-id {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    display: flex;
    align-items: center;
    gap: 8px;
}

.status-badge {
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-pending {
    background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
    color: #d63031;
}

.status-completed {
    background: linear-gradient(135deg, #55efc4, #00b894);
    color: #00695c;
}

.status-cancelled {
    background: linear-gradient(135deg, #fd79a8, #e84393);
    color: #c0392b;
}

.order-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
}

.detail-item i {
    color: #667eea;
    width: 16px;
}

.order-total {
    font-size: 1.3rem;
    font-weight: bold;
    color: #27ae60;
    text-align: right;
    margin-bottom: 15px;
}

.order-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

.action-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.btn-secondary {
    background: transparent;
    color: #667eea;
    border: 2px solid #667eea;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #5a67d8, #6b46c1);
}

.btn-secondary:hover {
    background: #667eea;
    color: white;
}

@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    .header h1 {
        font-size: 2rem;
    }

    .orders-header {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }

    .filter-buttons {
        justify-content: center;
    }

    .order-header {
        flex-direction: column;
        gap: 10px;
    }

    .order-actions {
        justify-content: center;
    }

    .action-btn {
        flex: 1;
        justify-content: center;
    }
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.empty-state i {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 20px;
}

.loading {
    display: none;
    text-align: center;
    padding: 40px;
}

.spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #667eea;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>

<div class="container">
    <div class="header">
        <h1><i class="fas fa-shopping-bag"></i> Đơn Hàng Của Tôi</h1>
        <p>Quản lý và theo dõi tất cả đơn hàng của bạn</p>
    </div>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <div class="stats-container">
        <div class="stat-card">
            <i class="fas fa-clock"></i>
            <h3><?php echo e($processingCount); ?></h3>
            <p>Đang xử lý</p>
        </div>
        <div class="stat-card">
            <i class="fas fa-check-circle"></i>
            <h3><?php echo e($completedCount); ?></h3>
            <p>Hoàn thành</p>
        </div>
        <div class="stat-card">
            <i class="fas fa-times-circle"></i>
            <h3><?php echo e($cancelledCount); ?></h3>
            <p>Đã hủy</p>
        </div>
        <div class="stat-card">
            <i class="fas fa-dollar-sign"></i>
            <h3><?php echo e(number_format($totalValue, 0, ',', '.')); ?> VND</h3>
            <p>Tổng giá trị</p>
        </div>
    </div>


    <div class="orders-container">
        <div class="orders-header">
            <div class="orders-title">
                <i class="fas fa-list"></i>
                Danh sách đơn hàng
            </div>
            <div class="filter-buttons">
                <a href="<?php echo e(route('oder.list', ['status' => 'all'])); ?>"
                    class="filter-btn <?php echo e($statusFilter === 'all' ? 'active' : ''); ?>">Tất cả</a>
                <a href="<?php echo e(route('oder.list', ['status' => App\Models\Order::STATUS_PROCESSING])); ?>"
                    class="filter-btn <?php echo e($statusFilter === App\Models\Order::STATUS_PROCESSING ? 'active' : ''); ?>">Đang
                    xử lý</a>
                <a href="<?php echo e(route('oder.list', ['status' => App\Models\Order::STATUS_COMPLETED])); ?>"
                    class="filter-btn <?php echo e($statusFilter === App\Models\Order::STATUS_COMPLETED ? 'active' : ''); ?>">Hoàn
                    thành</a>
                <a href="<?php echo e(route('oder.list', ['status' => App\Models\Order::STATUS_CANCELLED])); ?>"
                    class="filter-btn <?php echo e($statusFilter === App\Models\Order::STATUS_CANCELLED ? 'active' : ''); ?>">Đã
                    hủy</a>
            </div>

        </div>

        <div class="loading">
            <div class="spinner"></div>
            <p>Đang tải đơn hàng...</p>
        </div>

        <div id="orders-list">
             <?php if($noOrders): ?>
        <div class="alert alert-info text-center">
            Không có đơn hàng nào phù hợp với bộ lọc hiện tại.
        </div>
    <?php else: ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="order-card" data-status="pending">
                <div class="order-header">
                    <div class="order-id">
                        Đơn hàng
                        <i class="fas fa-receipt"></i>
                        <?php echo e($order->id); ?>

                    </div>
                    <div class="status-badge status-pending">

                        <?php if($order->status === App\Models\Order::STATUS_PROCESSING): ?>
                        <span class="badge bg-warning">Đang xử lý</span>
                        <?php elseif($order->status === App\Models\Order::STATUS_COMPLETED): ?>
                        <span class="badge bg-success">Hoàn thành</span>
                        <?php elseif($order->status === App\Models\Order::STATUS_CANCELLED): ?>
                        <span class="badge bg-danger">Đã hủy</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="order-details">
                    <div class="detail-item">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')); ?></span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-box"></i>
                        <span><?php echo e($order->items->count()); ?> sản phẩm</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-truck"></i>
                        <span><?php echo e($order->shipping_method ?? 'Giao hàng tiêu chuẩn'); ?> Giao hàng tiêu chuẩn</span>
                    </div>
                </div>
                <div class="order-total"><?php echo e(number_format($order->total_price, 0, ',', '.')); ?> ₫</div>
                <div class="order-actions">
                    
                    <?php if($order->status === App\Models\Order::STATUS_PROCESSING): ?>
                    <form action="<?php echo e(route('order.cancel', ['orderId' => $order->id])); ?>" method="POST"
                        style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="action-btn btn-secondary"
                            onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">
                            <i class="fas fa-times"></i> Hủy đơn
                        </button>
                    </form>
                    <?php endif; ?>

                    <a href="<?php echo e(route('order.details', $order->id)); ?>" class="action-btn btn-primary">
                        <i class="fas fa-eye"></i> Xem chi tiết
                    </a>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
        <div class="pagination-wrapper">
            <?php echo e($orders->appends(request()->query())->links('pagination::bootstrap-5')); ?>

        </div>

         <?php endif; ?>

    </div>

</div>






<script>
function filterOrders(status) {
    const orders = document.querySelectorAll('.order-card');
    const buttons = document.querySelectorAll('.filter-btn');

    // Remove active class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));

    // Add active class to clicked button
    event.target.classList.add('active');

    // Show loading
    document.querySelector('.loading').style.display = 'block';
    document.getElementById('orders-list').style.display = 'none';

    setTimeout(() => {
        // Filter orders
        orders.forEach(order => {
            if (status === 'all' || order.dataset.status === status) {
                order.style.display = 'block';
            } else {
                order.style.display = 'none';
            }
        });

        // Hide loading
        document.querySelector('.loading').style.display = 'none';
        document.getElementById('orders-list').style.display = 'block';
    }, 500);
}

// Add hover effects and animations
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.order-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0) scale(1)';
        });
    });
});

// Simulate order updates
function simulateOrderUpdate() {
    const statusBadges = document.querySelectorAll('.status-badge');
    statusBadges.forEach(badge => {
        badge.addEventListener('click', function() {
            this.style.animation = 'pulse 0.5s ease-in-out';
            setTimeout(() => {
                this.style.animation = '';
            }, 500);
        });
    });
}

simulateOrderUpdate();
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/user/user_oder_list.blade.php ENDPATH**/ ?>