@extends('user.dashboard_user')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin cá nhân</h5>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Thông tin bên trái -->
                            <div class="col-md-8">
                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control"
                                           value="{{ old('username', auth()->user()->username) }}">
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="{{ old('email', auth()->user()->email) }}" readonly>
                                        <button type="button" class="btn btn-outline-secondary" id="edit-email-btn">Sửa Email</button>
                                    </div>
                                </div>

                                <!-- Mật khẩu -->
                               <!-- Thay mật khẩu -->
<div class="mb-3">
    <label class="form-label d-block">Mật khẩu</label>
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
        Thay đổi mật khẩu
    </button>
</div>

                            </div>

                            <!-- Avatar bên phải -->
                            <div class="col-md-4 text-center d-flex flex-column align-items-center justify-content-start">
 @if(auth()->user()->img)
    <img src="{{ asset('storage/' . auth()->user()->img) }}" class="rounded-circle img-thumbnail mb-3"
         style="width: 150px; height: 150px; object-fit: cover;">
@else
    <img src="https://via.placeholder.com/150" class="rounded-circle img-thumbnail mb-3"
         style="width: 150px; height: 150px;">
@endif


                                <div class="mb-3 w-100">
                                    <label for="avatar" class="form-label">Thay ảnh đại diện</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Nút lưu -->
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


 <!-- Modal đổi mật khẩu -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('user.changePassword') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
            <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
        </div>
    </form>
  </div>
</div>

<script>
    document.getElementById('edit-email-btn').addEventListener('click', function () {
        const emailInput = document.getElementById('email');
        emailInput.removeAttribute('readonly');
        emailInput.focus();
    });
</script>
@endsection
