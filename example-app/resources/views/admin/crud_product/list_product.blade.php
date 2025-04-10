@extends('admin.dashboard_admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Danh Sách Sản Phẩm</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4 text-end">
        <a href="{{ route('admin.add_product') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Danh Mục</th>
                <th>Thương Hiệu</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" width="70"></td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }} VND</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->brand }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection