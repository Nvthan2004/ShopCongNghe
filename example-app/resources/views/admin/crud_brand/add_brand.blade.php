@extends('admin.dashboard_admin')


@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Add Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter brand name">
        </div>
        
        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug (optional)">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter brand description"></textarea>
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
        </div>

        <!-- Is Active -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
            <label for="is_active" class="form-check-label">Is Active</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Brand</button>
    </form>
</div>


@endsection