<?php $__env->startSection('content'); ?>
<style>
.container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 20px;
}

.controls {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.search-box {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    min-width: 250px;
}

.search-input {
    flex: 1;
    padding: 10px 15px;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: #28a745;
    box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
}

.filter-select {
    padding: 10px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    background: white;
    cursor: pointer;
    font-size: 0.9rem;
}

.add-btn {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.add-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}

.table-container {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.table-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
}

.table-info {
    color: #666;
    font-size: 0.9rem;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

th {
    background-color: #f8f9fa;
    font-weight: 600;
    color: #555;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

tr:hover {
    background-color: #f8f9fa;
}

.order-id {
    font-weight: 600;
    color: #007bff;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.customer-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: linear-gradient(135deg, #007bff, #0056b3);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.8rem;
    font-weight: 600;
}

.customer-name {
    font-weight: 500;
}

.status {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.status-completed {
    background: #d1edff;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-cancelled {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.order-total {
    font-weight: 600;
    color: #28a745;
    font-size: 1.1rem;
}

.actions {
    display: flex;
    gap: 8px;
}

.action-btn {
    padding: 8px 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.8rem;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.2s ease;
}

.btn-view {
    background: #e3f2fd;
    color: #1976d2;
}

.btn-edit {
    background: #fff3e0;
    color: #f57c00;
}

.btn-delete {
    background: #ffebee;
    color: #d32f2f;
}

.action-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.pagination-info {
    color: #666;
    font-size: 0.9rem;
}

.pagination-controls {
    display: flex;
    gap: 10px;
}

.page-btn {
    padding: 8px 12px;
    border: 1px solid #dee2e6;
    background: white;
    color: #495057;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.85rem;
    transition: all 0.2s ease;
}

.page-btn:hover,
.page-btn.active {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 15px;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
}

.stat-icon.pending {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
}

.stat-icon.completed {
    background: linear-gradient(135deg, #28a745, #20c997);
}

.stat-icon.cancelled {
    background: linear-gradient(135deg, #dc3545, #c82333);
}

.stat-icon.total {
    background: linear-gradient(135deg, #007bff, #0056b3);
}

.stat-info h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 5px;
}

.stat-info p {
    color: #666;
    font-size: 0.9rem;
    margin: 0;
}

@media (max-width: 768px) {
    .controls {
        flex-direction: column;
        align-items: stretch;
    }

    .search-box {
        min-width: auto;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        min-width: 700px;
    }

    .actions {
        flex-direction: column;
    }

    .stats-row {
        grid-template-columns: 1fr;
    }
}
</style>



<div class="container">

    <h1 class="my-5">
        Quản Lý Đơn Hàng
    </h1>

    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo e($countPending); ?></h3>
                <p>Đơn hàng chờ xử lý</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon completed">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo e($countCompleted); ?></h3>
                <p>Đơn hàng hoàn thành</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cancelled">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo e($countCancelled); ?></h3>
                <p>Đơn hàng đã hủy</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo e(number_format($orders->where('status', 'completed')->sum('total_price'), 0, ',', '.')); ?> đ</h3>
                <p>Tổng doanh thu</p>
            </div>

        </div>
    </div>

    <div class="controls">
        <div class="search-box">
            <i class="fas fa-search" style="color: #666;"></i>
            <input type="text" class="search-input" placeholder="Tìm kiếm theo ID đơn hàng, tên khách hàng...">
        </div>
        <select class="filter-select" onchange="window.location.href='?status='+this.value">
            <option value="" <?php echo e($statusFilter == '' ? 'selected' : ''); ?>>Tất cả trạng thái</option>
            <option value="processing" <?php echo e($statusFilter == 'processing' ? 'selected' : ''); ?>>Chờ xử lý</option>
            <option value="completed" <?php echo e($statusFilter == 'completed' ? 'selected' : ''); ?>>Hoàn thành</option>
            <option value="cancelled" <?php echo e($statusFilter == 'cancelled' ? 'selected' : ''); ?>>Đã hủy</option>
        </select>

        <button class="add-btn">
            <i class="fas fa-plus"></i>
            Thêm đơn hàng
        </button>
    </div>

    <div class="table-container">
        <div class="table-header">
            <div class="table-title">
                <i class="fas fa-list"></i>
                Danh sách đơn hàng
            </div>
            <div class="table-info">
                Hiển thị 36 đơn hàng
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="order-id">#<?php echo e($order->id); ?></td>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar"><?php echo e(strtoupper(substr($order->user->username ?? 'KH', 0, 2))); ?>

                            </div>
                            <div class="customer-name"><?php echo e($order->user->username ?? 'Khách hàng'); ?></div>
                        </div>
                    </td>
                    <td><?php echo e($order->created_at->format('d/m/Y')); ?></td>
                    <td>
                        <?php
                        $statusClass = [
                        'processing' => 'status-processing',
                        'completed' => 'status-completed',
                        'cancelled' => 'status-cancelled'
                        ][$order->status] ?? '';

                        $statusText = [
                        'processing' => 'Chờ xử lý',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Đã hủy'
                        ][$order->status] ?? 'Không xác định';
                        ?>
                        <span class="status <?php echo e($statusClass); ?>"><?php echo e($statusText); ?></span>
                    </td>
                    <td class="order-total"><?php echo e(number_format($order->total_price,  0, ',', '.')); ?> đ</td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('order.show', $order->id)); ?>" class="action-btn btn-view">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="" class="action-btn btn-edit">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="<?php echo e(route('admin.orders.destroy', $order->id)); ?>" method="POST"
                                style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="action-btn btn-delete"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="pagination">
            <div class="pagination-info">
                Hiển thị <?php echo e($orders->firstItem()); ?>-<?php echo e($orders->lastItem()); ?> của <?php echo e($orders->total()); ?> kết quả
            </div>
            <div class="pagination-controls">
                <?php echo e($orders->links()); ?>

            </div>
        </div>

    </div>
</div>




<script>
// Search functionality
const searchInput = document.querySelector('.search-input');
const filterSelect = document.querySelector('.filter-select');
const tableRows = document.querySelectorAll('tbody tr');

searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    filterTable(searchTerm, filterSelect.value);
});

filterSelect.addEventListener('change', function() {
    const filterValue = this.value;
    filterTable(searchInput.value.toLowerCase(), filterValue);
});

function filterTable(searchTerm, statusFilter) {
    tableRows.forEach(row => {
        const orderId = row.querySelector('.order-id').textContent.toLowerCase();
        const customerName = row.querySelector('.customer-name').textContent.toLowerCase();
        const status = row.querySelector('.status').textContent.toLowerCase();

        const matchesSearch = orderId.includes(searchTerm) || customerName.includes(searchTerm);
        const matchesStatus = !statusFilter || status.includes(statusFilter);

        row.style.display = matchesSearch && matchesStatus ? '' : 'none';
    });
}

// Action button handlers




// CSS animation for fade out
const style = document.createElement('style');
style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: translateX(0); }
                to { opacity: 0; transform: translateX(-20px); }
            }
        `;
document.head.appendChild(style);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ĐỒ ÁN BACKEND2\ShopCongNghe\example-app\resources\views/admin/crud_order/list_order.blade.php ENDPATH**/ ?>