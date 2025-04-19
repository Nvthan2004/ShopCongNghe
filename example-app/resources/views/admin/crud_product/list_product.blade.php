@extends('admin.dashboard_admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Danh Sách Sản Phẩm</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Quản lý sản phẩm</h4>
        <a href="{{ route('admin.add_product') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
    </div>

    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th style="display: none;">ID</th>
                <th>Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá (VND)</th>
                <th>Mô Tả</th>
                <th>Số Lượng</th>
                <th>Danh Mục</th>
                <th>Thương Hiệu</th>
                <th>Ngày</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td style="display: none;">{{ $product->id }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="70"></td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }} VND</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td>
                <td>{{ $product->brand->name ?? 'N/A' }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                        class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Không có sản phẩm nào</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
    {{ $products->links('pagination::bootstrap-4') }}
</div>

</div>
@endsection