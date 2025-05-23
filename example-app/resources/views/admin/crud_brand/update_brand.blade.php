@extends('admin.dashboard_admin')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Edit Brand</h1>

    {{-- Thông báo lỗi từ session --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Thông báo thành công từ session --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        {{-- Set cờ để các tab khác biết cần reload --}}
        <script>
            localStorage.setItem('brand_updated', Date.now());
        </script>
    @endif

    {{-- Thông báo lỗi validate --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" id="brand-form">
        @csrf
        @method('PUT')

        <!-- Hidden updated_at input gửi lên server -->
        <input type="hidden" id="updated_at" name="updated_at" value="{{ $brand->updated_at ? $brand->updated_at->toIso8601String() : '' }}">

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $brand->name) }}">
        </div>

        <!-- Slug (Readonly) -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $brand->slug) }}" readonly>
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
        </div>

        <!-- Preview -->
        <div class="mb-3">
            <label class="form-label">Preview</label>
            <div id="preview-container">
                <img id="logo-preview" 
                     src="{{ $brand->logo ? asset('storage/' . $brand->logo) : '#' }}" 
                     alt="Logo Preview" 
                     style="display: {{ $brand->logo ? 'block' : 'none' }}; max-height: 200px; margin-top: 10px;">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Brand</button>
    </form>
</div>

<script>
    // Lưu thời điểm form được tải (dùng để so sánh với cập nhật khác)
    const formLoadedAt = Date.now();

    // Convert string to slug
    function stringToSlug(str) {
        return str
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
    }

    // Auto-generate slug when typing name
    document.getElementById('name').addEventListener('input', function () {
        document.getElementById('slug').value = stringToSlug(this.value);
    });

    // Preview logo image when selected
    document.getElementById('logo').addEventListener('change', function (event) {
        const preview = document.getElementById('logo-preview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });

    // Listen storage event: reload if updated in another tab
    window.addEventListener('storage', function(event) {
        if (event.key === 'brand_updated') {
            const updatedAt = parseInt(localStorage.getItem('brand_updated'), 10) || 0;
            if (updatedAt > formLoadedAt) {
                alert('Brand đã được cập nhật ở tab khác. Trang sẽ được tải lại để đồng bộ.');
                location.reload();
            }
        }
    });

    // When tab gains focus, check for update
    window.addEventListener('focus', function() {
        const updatedAt = parseInt(localStorage.getItem('brand_updated'), 10) || 0;
        if (updatedAt > formLoadedAt) {
            alert('Brand đã được cập nhật ở tab khác. Trang sẽ được tải lại để đồng bộ.');
            location.reload();
        }
    });

    // Before submit, check if form outdated by other tab update
    document.getElementById('brand-form').addEventListener('submit', function(e) {
        const updatedAt = parseInt(localStorage.getItem('brand_updated'), 10) || 0;
        if (updatedAt > formLoadedAt) {
            e.preventDefault();
            alert('Form đã lỗi thời vì đã có cập nhật ở tab khác. Trang sẽ được tải lại.');
            location.reload();
            return false;
        }
    });
</script>

@endsection
