@extends('user.dashboard_user')

@section('content')

<!-- Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h2>Chào mừng đến với Shop Công Nghệ</h2>
        <p>Nơi mua sắm thiết bị hiện đại và uy tín</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?electronics,gadgets" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block">
        <h2>Sản phẩm mới nhất</h2>
        <p>Luôn cập nhật xu hướng công nghệ</p>
      </div>
    </div>
  </div>
</div>

<!-- Sản phẩm -->
<div class="container my-5">
  <h3 class="mb-4 text-center fw-bold">Sản Phẩm Nổi Bật</h3>
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

@endsection