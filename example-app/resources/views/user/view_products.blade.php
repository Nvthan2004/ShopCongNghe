@extends('user.dashboard_user')

@section('content')

<!-- Banner -->
<div class="bg-light p-5 text-center">
    <h2 class="fw-bold">Tất Cả Sản Phẩm</h2>
    <p class="text-muted">Khám phá các sản phẩm công nghệ mới nhất tại Shop Công Nghệ</p>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Bộ lọc & sản phẩm -->
<div class="container my-5">
    <div class="row">
        <!-- Bộ lọc -->
        <div class="col-md-3">
            <!-- Hiển thị thông tin lọc -->
            @if (request('category') || request('brand') || request('price_range'))
            <div class="mb-4">
                <p><strong>Kết quả tìm kiếm:</strong></p>
                @if (request('category'))
                <p><strong>Loại sản phẩm:</strong> {{ $categories->firstWhere('id', request('category'))->name }}</p>
                @endif
                @if (request('brand'))
                <p><strong>Thương hiệu:</strong> {{ $brands->firstWhere('id', request('brand'))->name }}</p>
                @endif
                @if (request('price_range'))
                <p><strong>Khoảng giá:</strong>
                    @if (request('price_range') == '0-5000000') Dưới 5 triệu
                    @elseif (request('price_range') == '5000000-10000000') 5 - 10 triệu
                    @elseif (request('price_range') == '10000000-20000000') 10 - 20 triệu
                    @else Trên 20 triệu
                    @endif
                </p>
                @endif
            </div>
            @endif

            <div class="filter-section">
                <form method="GET" action="{{ route('user.product_view') }}">
                    <!-- Loại sản phẩm -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Loại sản phẩm</label>
                        <select class="form-select" name="category">
                            <option value="" selected>Tất cả</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Thương hiệu -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thương hiệu</label>
                        <select class="form-select" name="brand">
                            <option value="" selected>Tất cả</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Khoảng giá</label>
                        <select class="form-select" name="price_range">
                            <option value="" selected>Tất cả</option>
                            <option value="0-5000000" {{ request('price_range') == '0-5000000' ? 'selected' : '' }}>Dưới
                                5 triệu</option>
                            <option value="5000000-10000000"
                                {{ request('price_range') == '5000000-10000000' ? 'selected' : '' }}>5 - 10 triệu
                            </option>
                            <option value="10000000-20000000"
                                {{ request('price_range') == '10000000-20000000' ? 'selected' : '' }}>10 - 20 triệu
                            </option>
                            <option value="20000000-100000000"
                                {{ request('price_range') == '20000000-100000000' ? 'selected' : '' }}>Trên 20 triệu
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Lọc Sản Phẩm</button>
                </form>
            </div>

        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-md-9">



            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($products as $product)
                <div class="col">
                    <div class="card product-card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                            alt="{{ $product->name }}" />
                        <div class="card-body">
                            <h6 class="product-title">{{ $product->name }}</h6>
                            <p class="text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }} ₫</p>

                            <a href="{{ route('product.show', $product->id) }}"
                                class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
                            <form id="add-to-cart-form-{{ $product->id }}" class="add-to-cart-form"
                                action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-success btn-sm w-100">Thêm vào giỏ hàng</button>
                            </form>

                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center">Không có sản phẩm nào!</p>
                @endforelse
            </div>


            <!-- Phân trang -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                </ul>
            </nav>


        </div>
    </div>
</div>

<script>
    
</script>

@endsection