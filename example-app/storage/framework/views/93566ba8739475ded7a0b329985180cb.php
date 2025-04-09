<?php $__env->startSection('content'); ?>
<div class="container my-5">
            <h1 class="text-center mb-4">Quản Lý Sản Phẩm</h1>
    
            <!-- Thêm sản phẩm -->
            <div class="mb-4 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Thêm Sản Phẩm</button>
            </div>
    
            <!-- Danh sách sản phẩm -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Danh Mục</th>
                        <th>Thương Hiệu</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ảnh</td>
                        <td>Sản Phẩm A</td>
                        <td>500.000 VND</td>
                        <td>Điện Thoại</td>
                        <td>SamSung</td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal">Chỉnh Sửa</button>
                            <button class="btn btn-danger">Xóa</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    
        <!-- Modal Thêm Sản Phẩm -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Thêm Sản Phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="productName" required>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Giá</label>
                                <input type="number" class="form-control" id="productPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Danh Mục</label>
                                <select class="form-select" id="productCategory" required>
                                    <option value="Điện Thoại">Điện Thoại</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Máy Tính Bảng">Máy Tính Bảng</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal Chỉnh Sửa Sản Phẩm -->
        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Chỉnh Sửa Sản Phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="editProductName" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="editProductName" value="Sản Phẩm A" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductPrice" class="form-label">Giá</label>
                                <input type="number" class="form-control" id="editProductPrice" value="500000" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductCategory" class="form-label">Danh Mục</label>
                                <select class="form-select" id="editProductCategory" required>
                                    <option value="Điện Thoại">Điện Thoại</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Máy Tính Bảng">Máy Tính Bảng</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/admin/crud_product/list_product.blade.php ENDPATH**/ ?>