@extends('admin.dashboard_admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Danh Sách Người Dùng</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <!-- Hiển thị ảnh đại diện với hình tròn và kích thước vừa phải -->
                        <img src="{{ asset('storage/' . $user->img) }}" alt="Avatar" class="rounded-circle" width="50" height="50">
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Vai trò người dùng sẽ được làm nổi bật bằng badge -->
                        <span class="badge bg-primary">{{ $user->role }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
