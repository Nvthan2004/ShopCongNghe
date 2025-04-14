@extends('user.dashboard_user')

@section('content')

<div class="container py-4">


<!-- Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      
      <div class="carousel-inner ">
        <div id="carousel-item" class="carousel-item active">
          <img src="{{ asset('storage/img/samsunggalaxyslidings24.png') }}" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-none d-md-block">
            <h2><i class="fas fa-mobile-alt me-2"></i>Chào mừng đến với Shop Công Nghệ</h2>
            <p>Nơi mua sắm thiết bị hiện đại và uy tín</p>
          </div>
        </div>
        <div id="carousel-item" class="carousel-item">
          <img src="{{ asset('storage/img/Macair13.png') }}" class="d-block w-100" alt="Slide 2">
          <div class="carousel-caption d-none d-md-block">
            <h2><i class="fas fa-laptop me-2"></i>Sản phẩm mới nhất</h2>
            <p>Luôn cập nhật xu hướng công nghệ</p>
          </div>
        </div>
        <div id="carousel-item" class="carousel-item">
          <img src="{{ asset('storage/img/xiaomi_14.png') }}" class="d-block w-100" alt="Slide 3">
          <div class="carousel-caption d-none d-md-block">
            <h2><i class="fas fa-laptop me-2"></i>Sản phẩm mới nhất</h2>
            <p>Luôn cập nhật xu hướng công nghệ</p>
          </div>
        </div>
      </div>
      
      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>
<!-- Sản phẩm -->
<div class="container my-5">
<div id="featuredProductsCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Tiêu đề -->
  <h3 class="mb-4 text-center fw-bold">Sản Phẩm Nổi Bật</h3>

  <!-- Các sản phẩm -->
  <div class="carousel-inner">
    <!-- Slide 1 -->
    <div class="carousel-item active" data-bs-interval="3000">
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card product-card shadow-sm">
            <img src="https://source.unsplash.com/300x200/?smartphone" class="card-img-top" alt="Điện thoại">
            <div class="card-body">
              <h5 class="card-title">Điện thoại thông minh</h5>
              <p class="card-text">Thiết kế sang trọng, hiệu năng mạnh mẽ.</p>
              <button class="btn btn-primary w-100">Mua ngay</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card product-card shadow-sm">
            <img src="https://source.unsplash.com/300x200/?laptop" class="card-img-top" alt="Laptop">
            <div class="card-body">
              <h5 class="card-title">Laptop mới nhất</h5>
              <p class="card-text">Cấu hình mạnh, mỏng nhẹ, pin lâu.</p>
              <button class="btn btn-primary w-100">Mua ngay</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card product-card shadow-sm">
            <img src="https://source.unsplash.com/300x200/?smartwatch" class="card-img-top" alt="Smartwatch">
            <div class="card-body">
              <h5 class="card-title">Đồng hồ thông minh</h5>
              <p class="card-text">Theo dõi sức khoẻ, kết nối dễ dàng.</p>
              <button class="btn btn-primary w-100">Mua ngay</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card product-card shadow-sm">
            <img src="https://source.unsplash.com/300x200/?headphones" class="card-img-top" alt="Tai nghe">
            <div class="card-body">
              <h5 class="card-title">Tai nghe không dây</h5>
              <p class="card-text">Âm thanh sống động, thời lượng pin ấn tượng.</p>
              <button class="btn btn-primary w-100">Mua ngay</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item" data-bs-interval="3000">
      <div class="row g-4">
        <!-- Các sản phẩm tiếp theo -->
        <div class="col-md-3">
          <div class="card product-card shadow-sm">
            <img src="https://source.unsplash.com/300x200/?tablet" class="card-img-top" alt="Tablet">
            <div class="card-body">
              <h5 class="card-title">Máy tính bảng</h5>
              <p class="card-text">Màn hình lớn, tiện lợi cho công việc.</p>
              <button class="btn btn-primary w-100">Mua ngay</button>
            </div>
          </div>
        </div>
        <!-- ... Thêm các sản phẩm khác (tổng cộng 6 sản phẩm trong slide 2) -->
      </div>
    </div>
  </div>

  <!-- Nút điều hướng -->
  <button class="carousel-control-prev" type="button" data-bs-target="#featuredProductsCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#featuredProductsCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>


@include('user.contact')

@endsection