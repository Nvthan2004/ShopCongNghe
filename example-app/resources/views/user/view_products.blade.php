@extends('user.dashboard_user')

@section('content')

<!-- Banner -->
<div class="bg-light p-5 text-center">
  <h2 class="fw-bold">Tất Cả Sản Phẩm</h2>
  <p class="text-muted">Khám phá các sản phẩm công nghệ mới nhất tại Shop Công Nghệ</p>
</div>

<!-- Bộ lọc & sản phẩm -->
<div class="container my-5">
  <div class="row">
    <!-- Bộ lọc -->
    <div class="col-md-3">
      <div class="filter-section">
        <h5 class="mb-3 fw-bold">Bộ Lọc</h5>
        <!-- Loại sản phẩm -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Loại sản phẩm</label>
          <select class="form-select">
            <option selected>Tất cả</option>
            <option>Điện thoại</option>
            <option>Laptop</option>
            <option>Tablet</option>
            <option>Phụ kiện</option>
          </select>
        </div>
        <!-- Thương hiệu -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Thương hiệu</label>
          <select class="form-select">
            <option selected>Tất cả</option>
            <option>Apple</option>
            <option>Samsung</option>
            <option>Xiaomi</option>
            <option>Asus</option>
            <option>OPPO</option>
          </select>
        </div>
        <!-- Giá -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Khoảng giá</label>
          <select class="form-select">
            <option selected>Tất cả</option>
            <option>Dưới 5 triệu</option>
            <option>5 - 10 triệu</option>
            <option>10 - 20 triệu</option>
            <option>Trên 20 triệu</option>
          </select>
        </div>
        <button class="btn btn-primary w-100 mt-3">Lọc Sản Phẩm</button>
      </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="col-md-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Sản phẩm 1 -->
        <div class="col">
          <div class="card product-card h-100 shadow-sm">
            <img src="https://source.unsplash.com/300x200/?iphone" class="card-img-top" alt="iPhone" />
            <div class="card-body">
              <h6 class="product-title">iPhone 14 Pro Max 256GB</h6>
              <p class="text-danger fw-bold">33.990.000₫</p>
              <a href="product-detail.html" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
            </div>
          </div>
        </div>
        <!-- Sản phẩm 2 -->
        <div class="col">
          <div class="card product-card h-100 shadow-sm">
            <img src="https://source.unsplash.com/300x200/?samsung" class="card-img-top" alt="Samsung" />
            <div class="card-body">
              <h6 class="product-title">Samsung Galaxy S24 Ultra</h6>
              <p class="text-danger fw-bold">28.990.000₫</p>
              <a href="product-detail.html" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
            </div>
          </div>
        </div>
        <!-- Sản phẩm 3 -->
        <div class="col">
          <div class="card product-card h-100 shadow-sm">
            <img src="https://source.unsplash.com/300x200/?laptop" class="card-img-top" alt="Laptop" />
            <div class="card-body">
              <h6 class="product-title">Laptop Asus ZenBook OLED</h6>
              <p class="text-danger fw-bold">22.990.000₫</p>
              <a href="product-detail.html" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
            </div>
          </div>
        </div>
        <!-- Sản phẩm 4 -->
        <div class="col">
          <div class="card product-card h-100 shadow-sm">
            <img src="https://source.unsplash.com/300x200/?xiaomi" class="card-img-top" alt="Xiaomi" />
            <div class="card-body">
              <h6 class="product-title">Xiaomi 13T Pro 5G</h6>
              <p class="text-danger fw-bold">14.990.000₫</p>
              <a href="product-detail.html" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
            </div>
          </div>
        </div>
        <!-- Sản phẩm 5 -->
        <div class="col">
          <div class="card product-card h-100 shadow-sm">
            <img src="https://source.unsplash.com/300x200/?tablet" class="card-img-top" alt="Tablet" />
            <div class="card-body">
              <h6 class="product-title">iPad Pro M2 11 inch</h6>
              <p class="text-danger fw-bold">21.490.000₫</p>
              <a href="product-detail.html" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
            </div>
          </div>
        </div>
        <!-- Sản phẩm 6 -->
        <div class="col">
          <div class="card product-card h-100 shadow-sm">
            <img src="https://source.unsplash.com/300x200/?headphones" class="card-img-top" alt="Tai nghe" />
            <div class="card-body">
              <h6 class="product-title">Tai nghe Bluetooth Sony WH-1000XM5</h6>
              <p class="text-danger fw-bold">7.990.000₫</p>
              <a href="product-detail.html" class="btn btn-outline-primary btn-sm w-100">Xem Chi Tiết</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Phân trang -->
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled"><a class="page-link">Trước</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Sau</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>


@endsection