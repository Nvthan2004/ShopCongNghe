@extends('admin.dashboard_admin')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Chỉnh Sửa Sản Phẩm</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Danh Mục</label>
            <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Thương Hiệu</label>
            <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh Sản Phẩm</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="80" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('admin.product') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection