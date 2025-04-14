@extends('admin.dashboard_admin')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Category List</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.add_category') }}" class="btn btn-primary mb-3">Add New Category</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="display: none;">#</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorys as $category)
                <tr>
                    <td style="display: none;">{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="50">
                    @else
                    N/A
                    @endif
                </td>
                    <td>
                        <a href="{{ route('categorys.edit_cate', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categorys.destroy_category', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
