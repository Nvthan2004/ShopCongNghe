@extends('admin.dashboard_admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Cập Nhật Sản Phẩm</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        id="updateProductForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="4"
                required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}"
                required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh Mục</label>
            <select class="form-select" id="category" name="category" required>
                @foreach ($categories as $category)
                <option value="{{ $category->name }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Thương Hiệu</label>
            <select class="form-select" id="brand" name="brand" required>
                @foreach ($brands as $brand)
                <option value="{{ $brand->name }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mt-3">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Cập Nhật</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Khi submit form Cập Nhật
    document.getElementById('updateProductForm').addEventListener('submit', function() {
        // Lưu thời gian cập nhật vào localStorage
        localStorage.setItem('productUpdated', Date.now());
        // Có thể thêm alert hoặc console
        console.log('Đã gửi cập nhật sản phẩm và ghi localStorage');
    });

    // Các tab khác lắng nghe sự kiện storage
    window.addEventListener('storage', function(event) {
        if (event.key === 'productUpdated') {
            // Thông báo cho người dùng biết có cập nhật mới từ tab khác
            alert(
                '⚠️ Có thay đổi dữ liệu sản phẩm từ tab khác! Vui lòng tải lại trang để xem cập nhật mới.');
            // Hoặc tự động reload trang nếu bạn muốn:
            // location.reload();
        }
    });
}); // Nút test cho việc thử nghiệm
</script>
@endsection