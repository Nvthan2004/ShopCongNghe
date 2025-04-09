<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
    }
    .sidebar {
      min-height: 100vh;
      background-color: #343a40;
      color: white;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .chart-area {
      min-height: 300px;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      padding: 20px;
      margin-bottom: 20px;
    }
    .stat-box {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand me-auto" href="#">Admin Dashboard</a>
  
    <!-- Search bar -->
    <form class="d-none d-md-flex mx-auto" role="search">
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
      <button class="btn btn-outline-light" type="submit">Tìm</button>
    </form>
  
    <!-- User Info & Logout -->
    <ul class="navbar-nav ms-auto">
      <!-- Thông báo -->
      <li class="nav-item me-3">
        <a class="nav-link" href="#">
          <i class="bi bi-bell-fill"></i>
        </a>
      </li>
      <!-- Tên người dùng -->
      <li class="nav-item me-3 d-flex align-items-center">
        <img src="https://via.placeholder.com/30" class="rounded-circle me-2" alt="Avatar">
        <span class="text-white">Admin</span>
      </li>
      <!-- Nút logout -->
      <li class="nav-item">
        <a class="btn btn-outline-light" href="#">Đăng xuất</a>
      </li>
    </ul>
  </nav>
  

  <div class="container-fluid">
    <div class="row">
      
      <!-- Sidebar -->
      <div class="col-md-2 sidebar p-3">
        <h5>Menu</h5>
        <a href="{{ route('admin.home') }}">Dashboard</a>
        <a href="#">Users</a>
        <a href="{{ route('admin.product') }}">Products</a>
        <a href="#">Categorys</a>
        <a href="{{ route('admin.brand') }}">Brands</a>
        <a href="#">Revenue</a>
        <a href="#">Settings</a>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 p-4">
      @yield('content')
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-4">
    © 2025 Admin Dashboard. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
