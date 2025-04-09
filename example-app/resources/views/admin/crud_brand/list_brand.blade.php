@extends('admin.dashboard_admin')


@section('content')

<div class="container mt-5">
    <h1 class="mb-4">List of Brands</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Add Brand Button -->
    <div class="mb-3">
        <a href="{{ route('admin.add_brand') }}" class="btn btn-primary">Add New Brand</a>
    </div>

    <!-- Brands Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($brands as $brand)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->slug }}</td>
                <td>
                    @if($brand->logo)
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" width="50">
                    @else
                    N/A
                    @endif
                </td>
                <td>
                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No brands found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection