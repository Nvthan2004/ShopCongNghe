@extends('admin.dashboard_admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Danh Sách Người Dùng</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $user->img) }}" alt="Avatar" class="rounded-circle" width="50" height="50">
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $user->role }}</span>
                    </td>
                    <td>
                        @if(auth()->user()->id !== $user->id)
                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá người dùng này không?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3-fill"></i> Xoá
                            </button>
                        </form>
                        @else
                            <span class="text-muted">Đang Hoạt Động</span>
                        @endif
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
