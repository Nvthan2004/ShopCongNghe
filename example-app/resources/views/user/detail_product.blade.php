@extends('user.dashboard_user')

@section('content')
<div class="container my-5">
    <div class="row g-5">
        <div class="col-md-5">
            <img style=" object-position: center; object-fit: contain; height: 500px;" src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-img" alt="{{ $product->name }}">
        </div>
        <div class="col-md-7">
            <h3>{{ $product->name }}</h3>
            <p class="text-muted">Mã SP: {{ $product->sku }}</p>
            <h4 class="text-danger mb-3">{{ number_format($product->price, 0, ',', '.') }}₫</h4>
            <p>{{ $product->description }}</p>
            <ul>
                <li>Chip xử lý: {{ $product->chip }}</li>
                <li>RAM: {{ $product->ram }}GB</li>
                <li>Bộ nhớ: {{ $product->storage }}GB</li>
                <li>Pin: {{ $product->battery }}mAh</li>
            </ul>
            <button class="btn btn-primary mt-3">Mua Ngay</button>
        </div>
    </div>

    <ul class="nav nav-tabs mt-5" id="productTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button">Mô Tả</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button">Đánh Giá</button>
        </li>
    </ul>
    <div class="tab-content p-3 border border-top-0" id="productTabContent">
        <div class="tab-pane fade show active" id="desc" role="tabpanel">
            <p>{{ $product->description }}</p>
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel">
            <!-- Hiển thị đánh giá -->
            <p>Hiện tại chưa có đánh giá.</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <h4 class="mb-4 fw-bold">Sản Phẩm Liên Quan</h4>
    <div class="row g-4">
        @foreach ($relatedProducts as $relatedProduct)
        <div class="col-md-3">
            <div class="card related-product shadow-sm">
                <img src="{{ asset('storage/' . $relatedProduct->image) }}" class="card-img-top w-100" alt="{{ $relatedProduct->name }}" style=" object-position: center; object-fit: contain; height: 200px;">
                <div class="card-body">
                    <h6 class="card-title">{{ $relatedProduct->name }}</h6>
                    <p class="text-danger fw-bold">{{ number_format($relatedProduct->price, 0, ',', '.') }}₫</p>
                    <a href="{{ route('product.show', $relatedProduct->id) }}" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
